<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Database\DatabaseConnection;

use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\SessionRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\SessionService;
use Tolehoai\CarForRent\Service\UserService;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Validator\UserValidator;

class UserController extends Controller
{
    private $userService;
    private $sessionService;
    private $userValidator;
    protected $connection;

    public function __construct()
    {
        $connection = DatabaseConnection::getConnection();
        $userRepository = new UserRepository();
        $this->userService = new UserService($userRepository);
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
        $this->userValidator = new UserValidator();
    }



    public function login()
    {
        return $this->render('login');
    }

    public function loginAction()
    {
        try {
            $userTransfer = new UserTransfer();
            $userTransfer->fromArray($_POST);

            $this->userValidator->validateUserLogin($userTransfer);

            $response = $this->userService->login($userTransfer);

            $this->sessionService->create($userTransfer->getUsername());
//            $_SESSION["username"] = $userTransfer->getUsername();
            View::redirect("/");
        }catch (ValidationException $e) {
            return View::renderView('login', [
                'title' => 'Login',
                'username' => $userTransfer->getUsername(),
                'password' => $userTransfer->getPassword(),
                'error' => $e->getMessage()
            ]);
        }

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
