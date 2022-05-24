<?php

namespace Test\Tolehoai\CarForRent\Repository;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\DatabaseService;

class UserRepositoryTest extends TestCase
{
    public function testFindByUsername(){
        $databaseService = new DatabaseService();
        $userRepository = new UserRepository($databaseService);
        $result = $userRepository->findByUsername('tolehoai')->getUsername();
        $expected = new User();
        $expected->setUsername('tolehoai');
        $this->assertEquals($expected->getUsername(), $result);
    }
}