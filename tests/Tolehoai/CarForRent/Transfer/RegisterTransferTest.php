<?php

namespace Test\Tolehoai\CarForRent\Transfer;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Traits\PasswordTrait;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterTransferTest extends TestCase
{
    public function testGetConfirmPassword()
    {
        $register = new RegisterTransfer();
        $register->setConfirmPassword('tolehoai');
        $confirm_password = $register->getConfirmPassword();
        $this->assertEquals('tolehoai', $confirm_password);
    }
    use PasswordTrait;
    public function testFromArray(){
        $params=[
            'username'=>'tolehoai',
            'password'=>'tolehoai',
            'confirmPassword'=>'tolehoai',
        ];

        $registerTransfer = new RegisterTransfer();
        $registerTransfer->fromArray($params);
        $this->assertEquals($params['username'], $registerTransfer->getUsername());
        $this->assertEquals($params['password'], $registerTransfer->getPassword());
        $this->assertEquals($params['confirmPassword'], $registerTransfer->getConfirmPassword());
    }
}