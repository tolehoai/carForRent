<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\CustomTrait\PasswordTrait;
use Tolehoai\CarForRent\Repository\RegisterRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterService
{
    use PasswordTrait;

    private UserRepository $userRepository;
    private RegisterTransfer $registerTransfer;

    public function __construct(
        UserRepository $userRepository, RegisterTransfer $registerTransfer
    )
    {
        $this->userRepository = $userRepository;
        $this->registerTransfer = $registerTransfer;
    }

    public function register(RegisterTransfer $registerTransfer)
    {

        $exitUser = $this->userRepository->findByUsername($registerTransfer->getUsername());

        if (($exitUser)) {
            return 'User Exits';
        }

        $registerTransfer->setPassword($this->hashPassword($registerTransfer->getPassword()));

        $registeredUser = $this->userRepository->save($registerTransfer);
        return $registeredUser;
    }
}