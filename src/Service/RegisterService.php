<?php

namespace Tolehoai\CarForRent\Service;

use Tolehoai\CarForRent\Repository\RegisterRepository;
use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Traits\PasswordTrait;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterService
{
    use PasswordTrait;

    private UserRepository $userRepository;
    private RegisterTransfer $registerTransfer;

    public function __construct(
        UserRepository $userRepository,
        RegisterTransfer $registerTransfer
    ) {
        $this->userRepository = $userRepository;
        $this->registerTransfer = $registerTransfer;
    }

    public function register(RegisterTransfer $registerTransfer)
    {

        try {
            $exitUser = $this->userRepository->findByUsername($registerTransfer->getUsername());
            if (($exitUser)) {
                return ['error' => true, 'message' => 'Exit User!'];
            }
            $registerTransfer->setPassword($this->hashPassword($registerTransfer->getPassword()));
            $registeredUser = $this->userRepository->save($registerTransfer);
            return $registeredUser;
        } catch (\PDOException $e) {
            return ['error' => true, 'message' => 'Error when query'];
        }
    }
}