<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\CookieService;
use Tolehoai\CarForRent\Service\DatabaseService;
use Tolehoai\CarForRent\Service\RandomService;
use Tolehoai\CarForRent\Service\SessionService;

class SessionServiceTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreate()
    {
        //da xoa random service
        $randomService = $this->getMockBuilder(RandomService::class)->disableOriginalConstructor()->getMock();
        $sessionId = $randomService->method('getUniqueId')->willReturn('123');

        $session = new Session();
        $session->setId($sessionId);
        $session->setUserId('tolehoai');

        $sessionRepositoryMock = $this->getMockBuilder(SessionRepository::class)->disableOriginalConstructor()->getMock(
        );
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $sessionRepositoryMock->method('save')->willReturn($session);


        $cookieServiceMock = $this->getMockBuilder(CookieService::class)->disableOriginalConstructor()->getMock();

        $sessionService = new SessionService(
            $sessionRepositoryMock,
            $userRepositoryMock,
            $cookieServiceMock,
            $randomService
        );

        $result = $sessionService->create($session->getUserId());

        $expected = new Session();
        $expected->setId('123');
        $expected->setUserId('tolehoai');

        $this->assertEquals($expected, $result);
    }


    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testDestroy()
    {
        $sessionRepositoryMock = $this->getMockBuilder(SessionRepository::class)->disableOriginalConstructor()->getMock(
        );
        $sessionRepositoryMock->method('deleteById')->willReturn(true);

        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $randomService = $this->getMockBuilder(RandomService::class)->disableOriginalConstructor()->getMock();
        $cookieService = new CookieService();
        $sessionService = new SessionService(
            $sessionRepositoryMock,
            $userRepositoryMock,
            $cookieService,
            $randomService
        );
        $result = $sessionService->destroy();

        $this->assertTrue($result);
    }

    public function testDestroyFailed()
    {
        $sessionRepositoryMock = $this->getMockBuilder(SessionRepository::class)->disableOriginalConstructor()->getMock(
        );
        $sessionRepositoryMock->method('deleteById')->willReturn(false);

        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $randomService = $this->getMockBuilder(RandomService::class)->disableOriginalConstructor()->getMock();
        $cookieService = new CookieService();
        $sessionService = new SessionService(
            $sessionRepositoryMock,
            $userRepositoryMock,
            $cookieService,
            $randomService
        );
        $result = $sessionService->destroy();

        $this->assertFalse($result);
    }
}
