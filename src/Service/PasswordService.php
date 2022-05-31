<?php

namespace Tolehoai\CarForRent\Service;

class PasswordService
{
    public function hashPassword(string $password){
        return password_hash($password,PASSWORD_BCRYPT);
    }
}