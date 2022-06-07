<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\DatabaseService;
use Tolehoai\CarForRent\Service\RegisterService;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class RegisterServiceTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $registerTransfer = new RegisterTransfer();
        $registerTransfer->setUsername('tolehoai_test');
        $registerTransfer->setPassword('123456');
        $registerTransfer->setConfirmPassword('123456');
        $registerTransfer->setHashPassword($registerTransfer->getPassword());
        $databaseService = new DatabaseService();
        $userTransformer = new UserTransformer();
        $userRepository = new UserRepository($databaseService, $userTransformer);
        $registerService = new RegisterService($userRepository, $registerTransfer);
        $result = $registerService->register($registerTransfer);
        $expected = $userRepository->findByUsername($result->getUsername());
        $this->assertEquals($result->getUsername(), $expected->getUsername());
        $userRepository->deleteById($expected->getId());
    }

    public function testRegisterWithExitUser()
    {
        $registerTransfer = new RegisterTransfer();
        $registerTransfer->setUsername('tolehoai');
        $registerTransfer->setPassword('tolehoai');
        $registerTransfer->setConfirmPassword('tolehoai');
        $registerTransfer->setHashPassword($registerTransfer->getPassword());

        $databaseService = new DatabaseService();
        $userTransformer = new UserTransformer();
        $userRepository = new UserRepository($databaseService, $userTransformer);

        $registerService = new RegisterService($userRepository, $registerTransfer);
        $result = $registerService->register($registerTransfer);
        $expected = ['error' => true, 'message' => 'Exit User!'];
        $this->assertEquals($result, $expected);
    }
}