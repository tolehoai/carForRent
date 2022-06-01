<?php

namespace Test\Tolehoai\CarForRent\Repository;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Session;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Service\DatabaseService;

class SessionRepositoryTest extends TestCase
{
    public function testSaveSuccess()
    {
        $databaseService = new DatabaseService();
        $sessionRepository = new SessionRepository($databaseService);
        $session = new Session();
        $session->setId(123);
        $session->setUserId('tolehoai2');
        $result = $sessionRepository->save($session);
        $expected = $sessionRepository->findById($session->getId());
        $this->assertEquals($expected, $result);
    }

    public function testSaveFailed()
    {
        $databaseService = new DatabaseService();
        $sessionRepository = new SessionRepository($databaseService);
        $session = new Session();
        $session->setId(123);
        $session->setUserId('tolehoai2');
        $result = $sessionRepository->save($session);
        $expected = false;
        $this->assertEquals($expected, $result);
    }
    public function testDeleteByIdFailed()
    {
        $databaseService = new DatabaseService();
        $sessionRepository = new SessionRepository($databaseService);
        $session = new Session();
        $session->setId(456);
        $result = $sessionRepository->deleteById($session->getId());

        $expected = false;
        $this->assertEquals($expected, $result);
    }

    public function testDeleteByIdSuccess()
    {
        $databaseService = new DatabaseService();
        $sessionRepository = new SessionRepository($databaseService);
        $session = new Session();
        $session->setId(123);
        $result = $sessionRepository->deleteById($session->getId());
        $expected = true;
        $this->assertEquals($expected, $result);
    }
}
