<?php

namespace Tolehoai\CarForRent\Transfer;

use Tolehoai\CarForRent\Boostrap\Request;

class UserTransfer extends Request
{
    /**
     * @var string|null
     */
    private ?string $username;

    /**
     * @var string|null
     */
    private ?string $password;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param  string|null $username
     * @return UserTransfer
     */
    public function setUsername(?string $username): UserTransfer
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param  string|null $password
     * @return UserTransfer
     */
    public function setPassword(?string $password): UserTransfer
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param  array $params
     * @return void
     */
    public function fromArray(array $params)
    {
        $this->username = $params['username'] ?? null;
        $this->password = $params['password'] ?? null;
        return $this;
    }
}