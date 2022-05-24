<?php

namespace Test\Tolehoai\CarForRent\UserTransfer;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserTransferTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetUsername()
    {
        $user = new UserTransfer();
        $user->setUsername('tolehoai');
        $user_username = $user->getUsername();
        $this->assertEquals('tolehoai', $user_username);
    }

    /**
     * @return void
     */
    public function testGetPassword()
    {
        $user = new UserTransfer();
        $user->setPassword('123');
        $user_password = $user->getPassword();
        $this->assertEquals('123', $user_password);
    }

    public function testFromArray()
    {
        $params = [
            'username'=>'tolehoai',
            'password'=>'tolehoai'
        ];
        $user = new UserTransfer();
        $result = $user->fromArray($params);
        $expected = new UserTransfer();
        $expected->setUsername('tolehoai');
        $expected->setPassword('tolehoai');
        $this->assertEquals($expected, $result);

    }
}