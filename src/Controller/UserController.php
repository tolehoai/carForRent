<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserController extends Controller
{
    private $userService;
    private $sessionService;
    private $userValidator;
    private $request;
    private $userTransfer;

    public function __construct(
        UserService $userService,
        Request $request,
        UserTransfer $userTransfer,
        UserValidator $userValidator,
        SessionService $sessionService
    ) {
        $this->userService = $userService;
        $this->request = $request;
        $this->userValidator = $userValidator;
        $this->sessionService = $sessionService;
        $this->userTransfer = $userTransfer;
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


    public function register()
    {
        return $this->render('register');
    }
}
