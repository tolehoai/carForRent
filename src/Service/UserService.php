<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Exception\LoginException;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserService
{
    private UserRepository $userRepository;
    private SessionService $sessionService;


    public function __construct(UserRepository $userRepository, SessionService $sessionService)
    {
        $this->userRepository = $userRepository;
        $this->sessionService = $sessionService;
    }

    public function login(UserTransfer $userInput)
    {
        $existUser = $this->userRepository->findByUsername($userInput);
        if ($existUser && password_verify($userInput->getPassword(), $existUser->getPassword())) {
            $this->sessionService->create($userInput->getUsername());
            return true;
        }
        return false;
    }
}
