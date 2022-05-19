<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Boostrap\Response;
use Tolehoai\CarForRent\Database\DatabaseConnection;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Model\User;
use Tolehoai\CarForRent\Repository\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($request)
    {
//        $this->validateUserRegistrationRequest($request);
        try {
            DatabaseConnection::beginTransaction();

            $user = $this->userRepository->findByUsername($request['txtUsername']);
            if ($user != null) {
//                throw new ValidationException("User sudah ada!");
                echo "Exit user!";
            }

            $user = new User();
            $user->username = $request['txtUsername'];
            $user->password = password_hash($request['txtPassword'], PASSWORD_BCRYPT);
            $this->userRepository->save($user);

//            $response = new UserRegisterResponse();
//            $response->user = $user;
//            Database::commitTransaction();

//            return $response;
        } catch (Exception $e) {
//            Database::rollbackTransaction();
//            throw $e;
        }
    }


    public function login(User $userInput)
    {
        $response = new Response();
        $response->setUser($userInput);
        $existUser = $this->userRepository->findByUsername($userInput);
        $errorMessage = [];
        if ($existUser == null) {
            throw new ValidationException("User not found");
        } else {
            if (password_verify($userInput->getPassword(), $existUser->getPassword())) {
                $response->setUser($existUser);
                array_push($errorMessage, "Login Success");
                $response->setMessage($errorMessage);
                return $response;
            } else {
                throw new ValidationException("Password wrong!");
            }
        }
    }

    private function validateUserLogin($request)
    {
        if (
            empty($request->username) ||
            empty($request->password)
        ) {
            echo("Id or password cannot be empty");
//            throw new ValidationException("Id or password cannot be empty");
        }
    }
}
