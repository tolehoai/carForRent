<?php

namespace Tolehoai\CarForRent\Controller;

use Tolehoai\CarForRent\Boostrap\Controller;
use Tolehoai\CarForRent\Boostrap\View;
use Tolehoai\CarForRent\Database\DatabaseConnection;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Service\UserService;

class UserController extends Controller
{
    private $userService;
    private $sessionService;

    public function __construct()
    {
        $userRepository = new UserRepository(DatabaseConnection::getConnection());
        $this->userService = new UserService($userRepository);
    }

    public function handleLogin()
    {
        // validation
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $this->validateUserLogin($user);
        //call UserService
        // check login
        try {
            $response = $this->userService->login($user);
            $_SESSION["username"] = $user->getUsername();
            View::redirect("/");
        } catch (ValidationException $e) {
            return View::renderView('login', [
                'title' => 'Login',
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'error' => $e->getMessage()
            ]);
        }
    }

    public function validateUserLogin($user)
    {
        if (
            empty($user->username) ||
            empty($user->password)
        ) {
            echo("Id or password cannot be empty");
//            throw new ValidationException("Id or password cannot be empty");
        }
    }

    public function login()
    {
        return $this->render('login');
    }
    public function handleLogout()
    {
        unset($_SESSION['username']);
        View::redirect("/");
    }
}
