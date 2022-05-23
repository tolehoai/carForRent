<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Boostrap\Response;
use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(UserTransfer $userInput)
    {
        $response = new Response();
        $response->setUser($userInput);
        $existUser = $this->userRepository->findByUsername($userInput);
        $errorMessage = [];
        if ($existUser == null) {
            throw new ValidationException("User or password invaild");
        } else {
            if (password_verify($userInput->getPassword(), $existUser->getPassword())) {
                $response->setUser($existUser);
                array_push($errorMessage, "Login Success");
                $response->setMessage($errorMessage);
                return $response;
            } else {
                throw new ValidationException("User or password invaild");
            }
        }
    }

}
