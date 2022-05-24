<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class SessionServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreate(){

        $sessionRepositoryMock = $this->getMockBuilder(SessionRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $session = new Session();
        $session->setId('628c9ac7ea59b');
        $session->setUserId('tolehoai');
        $sessionRepositoryMock->method('save')->willReturn($session);
        $sessionService = new SessionService($sessionRepositoryMock,$userRepositoryMock);

        $result=$sessionService->create($session);

        $expected = new Session();
        $expected->setId('628c9ac7ea59b');
        $expected->setUserId('tolehoai');
        $this->assertEquals($expected, $result);
    }


}