<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserValidator
{
    public function validateUserLogin(UserTransfer $user):array
    {
        if (
            empty($user->getUsername())
            || empty($user->getPassword())
        ) {
           return ["error"=>true, "message"=>"Id or password cannot be empty"];
        }
        return [];
    }
}
