<?php

namespace Test\Tolehoai\CarForRent\Controller;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\LoginService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;
use Tolehoai\CarForRent\Validator\UserValidator;

class LoginControllerTest extends TestCase
{
    public function testLoginActionPost()
    {
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $requestMock->method('isGet')->willReturn(false);
        $body = ['username' => 'tolehoai', 'password' => 'tolehoai'];
        $userTransfer = new UserTransfer();
        $userTransfer->fromArray($body);
        $userValidatorMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $userValidatorMock->method('validateUserLogin')->willReturn([]);
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $userTransformerMock = $this->getMockBuilder(UserTransformer::class)->disableOriginalConstructor()->getMock();
        $userService = new LoginService($userRepositoryMock, $sessionServiceMock, $userTransformerMock);
        $result = $userService->login($userTransfer);

    }
}