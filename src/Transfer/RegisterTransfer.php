<?php

namespace Tolehoai\CarForRent\Transfer;

class RegisterTransfer
{
    private ?string $username;
    private ?string $password;
    private ?string $confirmPassword;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    /**
     * @param string|null $confirmPassword
     */
    public function setConfirmPassword(?string $confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * @param array $params
     * @return void
     */
    public function fromArray(array $params)
    {
        $this->username = $params['username'] ?? null;
        $this->password = $params['password'] ?? null;
        $this->confirmPassword = $params['confirmPassword'] ?? null;
        return $this;
    }

}