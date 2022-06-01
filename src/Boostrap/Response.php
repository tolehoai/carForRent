<?php

namespace Tolehoai\CarForRent\Boostrap;

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
    private int $statusCode;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
        http_response_code($statusCode);
    }

    public function setResponseDataSuccess($data){
        $this->setStatusCode(200);
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($data);
    }
    public function setResponseDataFailed(string $error){
        $this->setStatusCode(406);
        header('Content-Type: application/json; charset=utf-8');
        return json_encode(["errorMessage"=>$error],true);
    }
}
