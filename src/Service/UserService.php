<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Exception\LoginException;
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
            return ['errorMessage'=>'User or password invaild', 'success'=>false];
        } else {
            if (!password_verify($userInput->getPassword(), $existUser->getPassword())) {
                return ['errorMessage'=>'User or password invaild', 'success'=>false];
            }
        }
        return ['success'=>true];
    }

}
