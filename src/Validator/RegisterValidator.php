<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Transfer\RegisterTransfer;

class RegisterValidator
{
    public function validateUserRegister(RegisterTransfer $user)
    {
        $validator = new Validator();
        $validator->name('username')->value($user->getUsername())->pattern('email')->min(3)->max(255)->required();
        $validator->name('password')->value($user->getPassword())->min(3)->max(255)->required();
        $validator->name('confirmPassword')->value($user->getConfirmPassword())->equal($user->getPassword())->min(3)->max(255)->required();
        if($validator->isSuccess()){
           return true;
        }else{
           return $validator->getErrors();
        }
    }
}