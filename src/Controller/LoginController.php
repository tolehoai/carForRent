<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\Request;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\LoginService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\UserValidator;

class LoginController extends BaseController
{
    private LoginService $userService;
    private SessionService $sessionService;
    private UserValidator $userValidator;
    private UserTransfer $userTransfer;


    private UserRepository $userRepository;

    public function __construct(
        LoginService $userService,
        UserTransfer $userTransfer,
        UserValidator $userValidator,
        SessionService $sessionService,
        UserRepository $userRepository,
        Request $request
    ) {
        parent::__construct($request);
        $this->userService = $userService;
        $this->userValidator = $userValidator;
        $this->sessionService = $sessionService;
        $this->userTransfer = $userTransfer;
        $this->userRepository = $userRepository;
    }

    public function loginAction()
    {

        if ($this->request->isGet()) {
            return $this->render('login');
        }
        $this->userTransfer->fromArray($this->request->getBody());
        $isLoginFormVaild = $this->userValidator->validateUserLogin($this->userTransfer);
        if (!empty($isLoginFormVaild)) {
            $message = [
                'title' => 'Login',
                'username' => $this->userTransfer->getUsername(),
                'password' => $this->userTransfer->getPassword(),
                'error' => true,
                'message' => $isLoginFormVaild['message']
            ];
            return View::renderView('login', $message);
        }
        $isLoginSuccess = $this->userService->login($this->userTransfer);
        if (!empty($isLoginSuccess)) {
            return View::redirect("/");
        }
        $errorMessage = 'The username or password is invalid!';
        $message = [
            'title' => 'Login',
            'username' => $this->userTransfer->getUsername(),
            'password' => $this->userTransfer->getPassword(),
            'error' => true,
            'message'=>$errorMessage
        ];
        return View::renderView('login', $message);
    }


    public function logout()
    {
        $this->sessionService->destroy();
        return View::redirect('/');
    }

    /**
     * @return LoginService
     */
    public function getUserService(): LoginService
    {
        return $this->userService;
    }

    /**
     * @param LoginService $userService
     */
    public function setUserService(LoginService $userService): void
    {
        $this->userService = $userService;
    }

    /**
     * @return SessionService
     */
    public function getSessionService(): SessionService
    {
        return $this->sessionService;
    }

    /**
     * @param SessionService $sessionService
     */
    public function setSessionService(SessionService $sessionService): void
    {
        $this->sessionService = $sessionService;
    }

    /**
     * @return UserValidator
     */
    public function getUserValidator(): UserValidator
    {
        return $this->userValidator;
    }

    /**
     * @param UserValidator $userValidator
     */
    public function setUserValidator(UserValidator $userValidator): void
    {
        $this->userValidator = $userValidator;
    }

    /**
     * @return UserTransfer
     */
    public function getUserTransfer(): UserTransfer
    {
        return $this->userTransfer;
    }

    /**
     * @param UserTransfer $userTransfer
     */
    public function setUserTransfer(UserTransfer $userTransfer): void
    {
        $this->userTransfer = $userTransfer;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository(): UserRepository
    {
        return $this->userRepository;
    }

    /**
     * @param UserRepository $userRepository
     */
    public function setUserRepository(UserRepository $userRepository): void
    {
        $this->userRepository = $userRepository;
    }


}
