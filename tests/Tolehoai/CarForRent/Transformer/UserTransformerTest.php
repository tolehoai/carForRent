<?php

namespace Test\Tolehoai\CarForRent\Transformer;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class UserTransformerTest extends TestCase
{
    public function testTransform()
    {
        $userTranformer = new UserTransformer();
        $user = new User();
        $user->setId(1);
        $user->setUsername('tolehoai');
        $result = $userTranformer->transform($user);
        $expected = [
            'id' => 1,
            'username' => 'tolehoai'
        ];
        $this->assertEquals($expected, $result);
    }
}