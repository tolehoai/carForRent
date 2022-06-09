<?php

namespace Tolehoai\CarForRent\Service;

use Dotenv\Dotenv;
use Firebase\JWT\JWT;

class TokenService
{
    protected static $dotenv;
    private string $jwtSecret;

    public function __construct()
    {
        self::$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        self::$dotenv->load();
        $this->jwtSecret = $_ENV['JWT_SECRET_KEY'];
    }

    public function jwtEncodeData($userTransformer)
    {
        $payload = [
            'id' => $userTransformer['id'],
            'username' => $userTransformer['username'],
            'iat' => time()
        ];
        $jwt = JWT::encode($payload, $this->jwtSecret, 'HS256');

        return $jwt;
    }

    /**
     * @param $token
     * @return array|bool
     */
    public function validateToken($token): array | bool
    {
        try {
            $decoded = JWT::decode($token,  new Key($this->jwtSecret, 'HS256'));
        } catch (\Exception $e) {
            return false;
        }
        return (array)$decoded;
    }

}