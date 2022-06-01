<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Exception\ValidationException;
use Tolehoai\CarForRent\Transfer\UserTransfer;

class UserValidator
{
    public function validateUserLogin(UserTransfer $user)
    {
        if (
            empty($user->getUsername())
            || empty($user->getPassword())
        ) {
            throw new ValidationException("Id or password cannot be empty");
        }
        return true;
    }
}
