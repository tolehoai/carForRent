<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Service\RegisterService;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\RegisterValidator;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserController extends Controller
{
    private $userService;
    private $sessionService;
    private $userValidator;
    private $request;
    private $userTransfer;
    private $registerTransfer;
    private $registerValidator;
    private $registerService;

    public function __construct(
        UserService $userService,
        Request $request,
        UserTransfer $userTransfer,
        UserValidator $userValidator,
        SessionService $sessionService,
        RegisterTransfer $registerTransfer,
        RegisterValidator $registerValidator,
        RegisterService $registerService,
    ) {
        $this->userService = $userService;
        $this->request = $request;
        $this->userValidator = $userValidator;
        $this->sessionService = $sessionService;
        $this->userTransfer = $userTransfer;
        $this->registerTransfer = $registerTransfer;
        $this->registerValidator = $registerValidator;
        $this->registerService = $registerService;
    }

    public function loginAction()
    {
        try {
            $errorMessage = '';
            if ($this->request->isGet()) {
                return $this->render('login');
            }

            $this->userTransfer->fromArray($this->request->getBody());
            $this->userValidator->validateUserLogin($this->userTransfer);

            $isLoginSuccess = $this->userService->login($this->userTransfer);

            if ($isLoginSuccess) {
                return View::redirect("/");
            }
            $errorMessage = 'The username or password is invalid!';
        } catch (\Exception $exception) {
            // logging
            $exception->getMessage();
            $errorMessage = 'The our system went something wrong!';
        }

        return View::renderView(
            'login',
            [
                'title' => 'Login',
                'username' => $this->userTransfer->getUsername(),
                'password' => $this->userTransfer->getPassword(),
                'error' => $errorMessage,
            ]
        );
    }


    public function logout()
    {
        $this->sessionService->destroy();
        return View::redirect('/');
    }


    public function registerAction()
    {
        if ($this->request->isGet()) {
            return $this->render('register');
        }
        $this->registerTransfer->fromArray($this->request->getBody());

        $isUserRegisterValid=$this->registerValidator->validateUserRegister($this->registerTransfer);
        if(is_array($isUserRegisterValid)){
            return View::renderView(
                'register',
                [
                    'error' => $isUserRegisterValid,
                ]
            );
        }
        $isRegisterSuccess = $this->registerService->register($this->registerTransfer);
        if( $isRegisterSuccess=='User Exits'){
            return View::renderView(
                'register',
                [
                    'failed' => 'User Exits',
                ]
            );
        }
        return View::renderView(
            'register',
            [
                'success' => 'Register Sucessfully!',
            ]
        );
    }
}
