<?php

namespace App\DTO\User;

use JsonSerializable;

class LoginDTO implements JsonSerializable
{
    public string $password;
    public string $email;

    public function __construct(string $password, int $email)
    {
        $this->password = $password;
        $this->email = $email;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['password'],
            $data['email']
        );
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize(): array
    {
        return [
            "password" => $this->getPassword(),
            "email" => $this->getEmail(),
        ];
    }
}