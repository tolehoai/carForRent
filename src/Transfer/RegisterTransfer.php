<?php

namespace Tolehoai\CarForRent\Transfer;

use Tolehoai\CarForRent\Traits\PasswordTrait;

class RegisterTransfer
{
    use PasswordTrait;
    private ?string $username;
    private ?string $password;
    private ?string $confirmPassword;
    private ?string $hashPassword;

    /**
     * @return string|null
     */
    public function getHashPassword(): ?string
    {
        return $this->hashPassword;
    }

    /**
     * @param string|null $hashPassword
     */
    public function setHashPassword(?string $password): void
    {
        $this->hashPassword = $this->hashPassword($password);
    }

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
        $this->setUsername($params['username'] ?? null);
        $this->setPassword( $params['password'] ?? null);
        $this->setConfirmPassword($params['confirmPassword'] ?? null);
        $this->setHashPassword($this->getPassword());
        return $this;
    }

}