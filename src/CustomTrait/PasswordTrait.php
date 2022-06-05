<?php

namespace Tolehoai\CarForRent\CustomTrait;

trait PasswordTrait
{
    public function hashPassword(string $password) {
        return password_hash($password,PASSWORD_BCRYPT);
    }
}