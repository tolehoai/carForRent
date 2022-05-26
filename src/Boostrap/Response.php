<?php

namespace Tolehoai\CarForRent\Boostrap;

use http\Client\Curl\User;

class Response
{
    public array $message = [];
    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * @param array $message
     */
    public function setMessage(array $message): void
    {
        $this->message = $message;
    }
    public $user;

    public static function setStatusCode(int $code): void
    {
        http_response_code($code);
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }
}
