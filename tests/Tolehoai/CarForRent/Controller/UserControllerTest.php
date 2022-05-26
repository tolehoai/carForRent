<?php

namespace Test\Tolehoai\CarForRent\Controller;

use http\Exception;
use PHPUnit\Framework\TestCase;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Controller\UserController;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserControllerTest extends TestCase
{
    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testLoginGetMethod()
    {
        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $requestMock->expects($this->once())->method('isGet')->willReturn(true);
        $userTransferMock = $this->getMockBuilder(UserTransfer::class)->disableOriginalConstructor()->getMock();
        $userValidatorMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $userController = new UserController(
            $userServiceMock,
            $requestMock,
            $userTransferMock,
            $userValidatorMock,
            $sessionServiceMock
        );
        $result = $userController->loginAction();
        $view = new View();
        $expected = $view::redirect('/');
        $this->assertEquals($expected, $result);
    }

    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testLoginAction()
    {
        $body = [
            'username' => 'tolehoai',
            'password' => 'tolehoai'
        ];
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $requestMock->expects($this->once())->method('isPost')->willReturn(true);
        $requestMock->expects($this->once())->method('getBody')->willReturn($body);

        $validateUserLoginMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $validateUserLoginMock->method('validateUserLogin')->willReturn(true);

        $userTransfer = new UserTransfer();
        $userTransfer->fromArray($body);

        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
        $userServiceMock->expects($this->once())->method('login')->willReturn(true);

        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();

        $userController = new UserController(
            $userServiceMock,
            $requestMock,
            $userTransfer,
            $validateUserLoginMock,
            $sessionServiceMock,
        );
        $result = $userController->loginAction();

        $view = new View();
        $expected = $view::redirect('/');
        $this->assertEquals($expected, $result);
    }

//    /**
//     * @runInSeparateProcess
//     * @throws \Exception
//     * @return void
//     */
//    public function testLoginActionException(){
//        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
//        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
//        $userTransferMock = $this->getMockBuilder(UserTransfer::class)->disableOriginalConstructor()->getMock();
//        $userValidatorMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
//        $userValidatorMock->method('validateUserLogin')->willThrowException(new \Exception);
//        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
//        $userController = new UserController(
//            $userServiceMock,
//            $requestMock,
//            $userTransferMock,
//            $userValidatorMock,
//            $sessionServiceMock
//        );
//        $this->expectException(new Exception::class);
//
//        $result = $userController->register();
//        $expected = $userController->render('register');
//    }

    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testLoginActionFailed()
    {
        $body = [
            'username' => 'tolehoai',
            'password' => 'tolehoai'
        ];
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();

        $requestMock->expects($this->once())->method('isPost')->willReturn(true);
        $requestMock->expects($this->once())->method('getBody')->willReturn($body);

        $validateUserLoginMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $validateUserLoginMock->method('validateUserLogin')->willReturn(true);

        $userTransfer = new UserTransfer();
        $userTransfer->fromArray($body);


        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
        $userServiceMock->expects($this->once())->method('login')->willReturn(false);
        $errorMessage = 'The username or password is invalid!';

        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();

        $userController = new UserController(
            $userServiceMock,
            $requestMock,
            $userTransfer,
            $validateUserLoginMock,
            $sessionServiceMock,
        );
        $result = $userController->loginAction();

        $view = new View();
        $expected = $view::renderView(
            'login',
            [
                'title' => 'Login',
                'username' => $userTransfer->getUsername(),
                'password' => $userTransfer->getPassword(),
                'error' => $errorMessage,
            ]
        );

        $this->assertEquals($expected, $result);
    }

    /**
     * @return void
     * @runInSeparateProcess
     */
    public function testLogout()
    {
        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $userTransferMock = $this->getMockBuilder(UserTransfer::class)->disableOriginalConstructor()->getMock();
        $userValidatorMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $sessionServiceMock->expects($this->once())->method('destroy')->willReturn(true);
        $userController = new UserController(
            $userServiceMock,
            $requestMock,
            $userTransferMock,
            $userValidatorMock,
            $sessionServiceMock
        );
        $result = $userController->logout();
        $view = new View();
        $expected = $view::redirect('/');
        $this->assertEquals($expected, $result);
    }

    /**
     * @runInSeparateProcess
     * @return void
     */
    public function testRegister()
    {
        $userServiceMock = $this->getMockBuilder(UserService::class)->disableOriginalConstructor()->getMock();
        $requestMock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()->getMock();
        $userTransferMock = $this->getMockBuilder(UserTransfer::class)->disableOriginalConstructor()->getMock();
        $userValidatorMock = $this->getMockBuilder(UserValidator::class)->disableOriginalConstructor()->getMock();
        $sessionServiceMock = $this->getMockBuilder(SessionService::class)->disableOriginalConstructor()->getMock();
        $userController = new UserController(
            $userServiceMock,
            $requestMock,
            $userTransferMock,
            $userValidatorMock,
            $sessionServiceMock
        );
        $result = $userController->register();
        $expected = $userController->render('register');
        $this->assertEquals($expected, $result);
    }
}
