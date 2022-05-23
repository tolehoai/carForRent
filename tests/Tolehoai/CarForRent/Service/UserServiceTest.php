<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserServiceTest extends TestCase
{
    /**
     *  * @dataProvider loginDataProvider
     * @return void
     */
    public function testLogin($params, $expected){
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn($params['username']);
        $userService = new UserService($userRepositoryMock);
        $userTransfer = new UserTransfer();

        $userTransfer->fromArray($params);
        $result=$userService->login($userTransfer);
        $this->assertEquals($expected['username'], $result->getUsername());
        $this->assertEquals($expected['password'], $result->getPassword());
    }

    /**
     * @return array[]
     */
    public function loginDataProvider(): array
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'username' => 'tolehoai',
                    'password' => 'tolehoai',

                ],
                'expected' => [

                    'username' => 'tolehoai',
                    'password' => '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG'
                ]
            ],
        ];
    }
}