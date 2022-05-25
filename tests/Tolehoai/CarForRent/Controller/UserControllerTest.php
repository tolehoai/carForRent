<?php

namespace Test\Tolehoai\CarForRent\Controller;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Boostrap\Request;

class UserControllerTest extends TestCase
{
    public function testLoginActionSuccess()
    {
        $request = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $request->method('isPost')->willReturn(true);
    }
}