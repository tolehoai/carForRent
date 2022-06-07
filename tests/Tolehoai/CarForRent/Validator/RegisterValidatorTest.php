<?php

namespace Test\Tolehoai\CarForRent\Validator;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;
use Tolehoai\CarForRent\Validator\RegisterValidator;

class RegisterValidatorTest extends TestCase
{
    public function testValidateUserRegisterSuccess()
    {
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn(null);
        $registerTransfer = new RegisterTransfer();
        $registerTransfer->setUsername('tolehoai@gmail.com');
        $registerTransfer->setPassword('tolehoai');
        $registerTransfer->setConfirmPassword('tolehoai');

        $userRegisterValidator = new RegisterValidator($userRepositoryMock);
        $result = $userRegisterValidator->validateUserRegister($registerTransfer);
        $this->assertEquals($result,[]);
    }
//    public function testValidateUserRegisterExistsUsername()
//    {
//        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
//        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn(new User());
//        $userRegisterRequest = new UserRegisterRequest();
//        $userRegisterRequest->setSelf('khaitri','123123','123123');
//        $userRegisterValidator = new RegisterValidatorTest($userRepositoryMock);
//        $result = $userRegisterValidator->validateUserRegister($userRegisterRequest);
//        $expectedError = [
//            'username'=>'Username already exists!'
//        ];
//        $this->assertEquals($expectedError,$result);
//    }
}