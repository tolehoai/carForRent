<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Exception\LoginException;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserServiceTest extends TestCase
{
    /**
     *  * @dataProvider loginDataProviderSuccess
     * @return void
     */
    public function testLoginSuccess($params, $expected)
    {
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn($params['user']);
        $userService = new UserService($userRepositoryMock);
        $userTransfer = new UserTransfer();

        $userTransfer->fromArray($params);
        $result = $userService->login($userTransfer);

        $this->assertEquals($expected['username'], $result->getUsername());
        $this->assertEquals($expected['password'], $result->getPassword());
    }
    /**
     * @return array[]
     */
    public function loginDataProviderSuccess(): array
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'username' => 'tolehoai',
                    'password' => 'tolehoai',
                    'user' => $this->getUser('tolehoai', '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG')
                ],
                'expected' => [

                    'username' => 'tolehoai',
                    'password' => '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG'
                ]
            ],
        ];
    }

    /**
     *  * @dataProvider loginDataProviderFailed
     * @return void
     */
    public function testLoginFailed($params, $expected)
    {
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn(null);

        $userService = new UserService($userRepositoryMock);
        $userTransfer = new UserTransfer();
        $this->expectException(LoginException::class);

        $userService->login($userTransfer);

    }
    /**
     * @return array[]
     */
    public function loginDataProviderFailed(): array
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'username' => 'user1',
                    'password' => 'tolehoai',
                    'user' => $this->getUser('user1', '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG')
                ],
                'expected' => [

                    'username' => 'tolehoai',
                    'password' => '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG'
                ]
            ],
        ];
    }

    private function getUser(string $username, string $password): UserTransfer
    {
        $user = new UserTransfer();
        $user->setUsername($username)->setPassword($password);
        return $user;
    }
}