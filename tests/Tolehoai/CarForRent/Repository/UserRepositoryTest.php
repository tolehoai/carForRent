<?php

namespace Test\Tolehoai\CarForRent\Repository;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\DatabaseService;

class UserRepositoryTest extends TestCase
{
    public function testFindByUsernameSuccess()
    {
        $databaseService = new DatabaseService();
        $userRepository = new UserRepository($databaseService);
        $result = $userRepository->findByUsername('tolehoai')->getUsername();
        $expected = new User();
        $expected->setUsername('tolehoai');
        $this->assertEquals($expected->getUsername(), $result);
    }

    public function testFindByUsernameFailed()
    {
        $databaseService = new DatabaseService();
        $userRepository = new UserRepository($databaseService);
        $result = $userRepository->findByUsername('tolehoai1');
        $this->assertEquals(null, $result);
    }

    public function testSave()
    {
        $databaseService = new DatabaseService();
        $userRepository = new UserRepository($databaseService);
        $user = new User();
        $user->setId(2);
        $user->setUsername('tolehoai2');
        $user->setPassword('$2a$12$cgoAjnZqrRFofINlgpI26uqDyem9eLkbEg2GX3IgCtfZybqErIuM6');
        $result = $userRepository->save($user);
        $expected = $userRepository->findByUsername($user->getUsername());
        $this->assertEquals($expected, $result);
    }

    public function testDeleteById()
    {
        $databaseService = new DatabaseService();
        $userRepository = new UserRepository($databaseService);
        $user=new User();
        $user->setId(2);
        $result = $userRepository->deleteById($user->getId());
        $expected = true;
        $this->assertEquals($expected, $result);
    }


}