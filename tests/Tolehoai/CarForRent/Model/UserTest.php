<?php

namespace Test\Tolehoai\CarForRent\Model;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\User;

class UserTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetId()
    {
        $user = new User();
         $user->setId(1);
        $user_id = $user->getId();
        $this->assertEquals(1, $user_id);
    }

    /**
     * @return void
     */
    public function testGetPassword()
    {
        $user = new User();
        $user->setPassword('abc');
        $user_password = $user->getPassword();
        $this->assertEquals('abc', $user_password);
    }

    /**
     * @return void
     */
    public function testGetUsername()
    {
        $user = new User();
        $user->setUsername('tolehoai');
        $user_username = $user->getUsername();
        $this->assertEquals('tolehoai', $user_username);
    }
}