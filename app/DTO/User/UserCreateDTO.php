<?php

namespace App\DTO\User;

use JsonSerializable;

class UserCreateDTO implements JsonSerializable
{
    public string $password;
    public string $otp;
    public string $phone;
    public string $email;
    public string $name;





    public function __construct(string $password, string $otp, string $phone, string $email, string $name)
    {
        $this->password = $password;
        $this->otp = $otp;
        $this->phone = $phone;
        $this->email = $email;
        $this->name = $name;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['password'],
            $data['otp'],
            $data['phone'],
            $data['email'],
            $data['full_name']

        );
    }

    /**
     * @return string
     */
    public function getOtp(): string
    {
        return $this->otp;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(): string
    {
        return $this->email;
    }
    public function getName(): string
    {
        return $this->email;
    }
    public function setName(): string
    {
        return $this->email;
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
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $otp
     */
    public function setOtp(string $otp): void
    {
        $this->otp = $otp;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
            "otp" => $this->getOtp(),
            "phone" => $this->getPhone(),
            'full_name'=>$this->getName(),
            'email'=>$this->getEmail(),

        ];
    }
}
