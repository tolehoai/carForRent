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
        $existUser = $this->userRepository->findByUsername($userInput);
        if ($existUser == null) {
            throw new LoginException("User or password invaild");
        } else {
            if (password_verify($userInput->getPassword(), $existUser->getPassword())) {
                return true;
            } else {
                throw new LoginException("User or password invaild");
            }
        }
    }

}
