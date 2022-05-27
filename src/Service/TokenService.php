<?php

namespace Tolehoai\CarForRent\Service;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenService
{
    protected static $dotenv;
    public function create(){
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        self::$dotenv = $dotenv->load();
        $key = $_ENV['SECRET_KEY'];
        $payload = [
            'iss' => 'http://example.org',
            'aud' => 'http://example.com',
            'iat' => 1356999524,
            'nbf' => 1357000000
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');

        return $jwt;
    }
}