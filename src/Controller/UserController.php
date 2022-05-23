<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\Response;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Exception\LoginException;
use Tolehoai\CarForRent\Exception\ValidationException;
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
    private $response;
    private $userTransfer;

    public function __construct(
        UserService $userService,
        Request $request,
        Response $response,
        UserTransfer $userTransfer,
        UserValidator $userValidator,
        SessionService $sessionService
    ) {
        $this->userService = $userService;
        $this->request = $request;
        $this->response = $response;
        $this->userValidator = $userValidator;
        $this->sessionService = $sessionService;
        $this->userTransfer=$userTransfer;
    }

    public function loginAction()
    {
        try {

            $this->userTransfer->fromArray() ;
            $this->userValidator->validateUserLogin($this->userTransfer);
            $response = $this->userService->login($this->userTransfer);
            var_dump($this->userTransfer);
            $this->sessionService->create($this->userTransfer->getUsername());
            View::redirect("/");
        } catch (LoginException $e) {
            return View::renderView('login', [
                'title' => 'Login',
                'username' => $this->userTransfer->getUsername(),
                'password' => $this->userTransfer->getPassword(),
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function login()
    {
        return $this->render('login');
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect('/');
    }


    public function register()
    {
        return $this->render('register');
    }

    public function handleRegister()
    {
        unset($_SESSION['username']);
        View::redirect("/");
    }


}
