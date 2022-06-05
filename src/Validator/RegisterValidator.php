<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Repository\UserRepository;
use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterValidator
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateUserRegister(RegisterTransfer $user)
    {
        $validator = new Validator();

        $exitUser = $this->userRepository->findByUsername($user->getUsername());
        if($exitUser){
            $validator->errors['username'] = 'Exit User';
        }
        $validator->name('username')->value($user->getUsername())->pattern('email')->min(3)->max(255)->required();
        $validator->name('password')->value($user->getPassword())->min(3)->max(255)->required();
        $validator->name('confirmPassword')->value($user->getConfirmPassword())->equal($user->getPassword())->min(3)->max(255)->required();
        if($validator->isSuccess()){
           return [];
        }else{
           return $validator->getErrors();
        }
    }
}