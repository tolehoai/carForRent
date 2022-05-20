<?php

namespace Tolehoai\CarForRent\Validator;

use Tolehoai\CarForRent\Exception\ValidationException;

class UserValidator
{
    public function validateUserLogin($user)
    {
        if (
            empty($user->getUsername()) ||
            empty($user->getPassword())
        ) {
            throw new ValidationException("Id or password cannot be empty");
        }
    }
}