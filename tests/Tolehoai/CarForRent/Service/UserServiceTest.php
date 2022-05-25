<?php

namespace Test\Tolehoai\CarForRent\Service;

use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserServiceTest extends TestCase
{
    /**
     *  * @dataProvider loginDataProviderSuccess
     *
     * @return void
     */
    public function testLoginSuccess($params, $expected)
    {
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findByUsername')->willReturn($params['user']);

        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $userService = new UserService($userRepositoryMock, $sessionServiceMock);
        $userTransfer = new UserTransfer();

        $userTransfer->fromArray($params);
        $result = $userService->login($userTransfer);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return
     */
    public function loginDataProviderSuccess()
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'username' => 'tolehoai',
                    'password' => 'tolehoai',
                    'user' => $this->getUser('tolehoai', '$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG')
                ],
                'expected' =>
                    true
            ],
            'happy-case-2' => [
                'params' => [
                    'username' => 'tolehoai',
                    'password' => '123',
                    'user' => $this->getUser('tolehoai', '1$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG')
                ],
                'expected' =>
                    false
            ],
            'happy-case-3' => [
                'params' => [
                    'username' => 'user1',
                    'password' => '123',
                    'user' => $this->getUser('tolehoai', '1$2a$12$.nA9eaCwOT5pxb/NNPpFuebd9uj0De/pkqMBDPITLPYVrj808FkEG')
                ],
                'expected' =>
                    false
            ],

        ];
    }


    private function getUser(string $username, string $password): User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        return $user;
    }
}