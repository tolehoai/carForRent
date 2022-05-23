<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Boostrap\Response;
use Tolehoai\CarForRent\Exception\LoginException;
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
            throw new LoginException("User or password invaild");
        } else {
            if (password_verify($userInput->getPassword(), $existUser->getPassword())) {
                $response->setUser($existUser);
                $response->setMessage($errorMessage);
                return true;
            } else {
                throw new LoginException("User or password invaild");
            }
        }
    }

}
