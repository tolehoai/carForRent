<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Session;
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
        $userId = 1;
        $databaseService = new DatabaseService();
        $sessionRepository = new SessionRepository($databaseService);
        $userRepository = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $cookieService = $this->getMockBuilder(CookieService::class)->disableOriginalConstructor()->getMock();
        $sessionService = new SessionService($sessionRepository, $userRepository, $cookieService);
        $result = $sessionService->create($userId);
        $session = $sessionRepository->findById($result->getId());

        $this->assertEquals($result, $session);
    }



    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testDestroy()
    {
        $sessionRepositoryMock = $this->getMockBuilder(SessionRepository::class)->disableOriginalConstructor()->getMock();
        $sessionRepositoryMock->method('deleteById')->willReturn(true);

        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $cookieService = new CookieService();
        $sessionService = new SessionService(
            $sessionRepositoryMock,
            $userRepositoryMock,
            $cookieService,
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
        $cookieService = new CookieService();
        $sessionService = new SessionService(
            $sessionRepositoryMock,
            $userRepositoryMock,
            $cookieService,
        );
        $result = $sessionService->destroy();

        $this->assertFalse($result);
    }
}
