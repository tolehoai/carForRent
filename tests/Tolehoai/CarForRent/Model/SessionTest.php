<?php

namespace Test\Tolehoai\CarForRent\Model;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\Session;

class SessionTest extends TestCase
{

    public function testGetId()
    {
        $session = new Session();
        $session->setId(1);
        $session_id = $session->getId();
        $this->assertEquals(1, $session_id);
    }

    public function testGetUserId()
    {
        $session = new Session();
        $session->setUserId(1);
        $session_user_id = $session->getUserId();
        $this->assertEquals(1, $session_user_id);
    }
}