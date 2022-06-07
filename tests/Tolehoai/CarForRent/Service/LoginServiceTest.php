<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\DatabaseService;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\LoginService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class LoginServiceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $body = ['username' => 'tolehoai', 'password' => 'tolehoai'];
        $databaseService = new DatabaseService();
        $userTransformer = new UserTransformer();
        $sessionService = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $userRepository = new UserRepository($databaseService, $userTransformer);
        $userService = new LoginService($userRepository,$sessionService, $userTransformer );
        $userTransfer = new UserTransfer();
        $userTransfer->fromArray($body);

        $result = $userService->login($userTransfer);

        $expected = $userRepository->findByUsername($result['username']);

        $this->assertEquals($result['username'], $expected->getUsername());
    }


}
