<?php

namespace Tolehoai\CarForRent\Traits;

trait PasswordTrait
{
    public function hashPassword(string $password) {
        return password_hash($password,PASSWORD_BCRYPT);
    }
}