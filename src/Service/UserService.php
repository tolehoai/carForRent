<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\UserTransfer;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class UserService
{
    private UserRepository $userRepository;
    private SessionService $sessionService;
    private UserTransformer $userTransformer;


    public function __construct(UserRepository $userRepository, SessionService $sessionService, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->sessionService = $sessionService;
        $this->userTransformer = $userTransformer;
    }

    public function login(UserTransfer $userInput)
    {
        $existUser = $this->userRepository->findByUsername($userInput->getUsername());
        if ($existUser && password_verify($userInput->getPassword(), $existUser->getPassword())) {
            $this->sessionService->create($userInput->getUsername());
            $userTransformer = $this->userTransformer->transform($existUser);
            return $userTransformer;
        }
        return false;
    }
}
