<?php

namespace Tolehoai\CarForRent\Service;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Tolehoai\CarForRent\Transformer\UserTransformer;

class TokenService
{
    protected static $dotenv;
    public function createUserLoginToken($userTransformer){
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();
        $key = $_ENV['SECRET_KEY'];
        $payload = [
           'id'=>$userTransformer['id'],
            'username'=>$userTransformer['username']
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');

        return $jwt;
    }
}