<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Repository\RegisterRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterService
{
    private RegisterRepository $registerRepository;
    private UserRepository $userRepository;
    private PasswordService $passwordService;
    private RegisterTransfer $registerTransfer;

    public function __construct(RegisterRepository $registerRepository, UserRepository $userRepository, PasswordService $passwordService, RegisterTransfer $registerTransfer)
    {
        $this->registerRepository = $registerRepository;
        $this->userRepository = $userRepository;
        $this->passwordService =$passwordService;
        $this->registerTransfer = $registerTransfer;
    }
    public function register(RegisterTransfer $registerTransfer){

        $exitUser = $this->userRepository->findByUsername($registerTransfer->getUsername());

        if(($exitUser)){
            return 'User Exits';
        }

        $registerTransfer->setPassword($this->passwordService->hashPassword($registerTransfer->getPassword()));

        $registeredUser=$this->userRepository->save($registerTransfer);
        return $registeredUser;
    }
}