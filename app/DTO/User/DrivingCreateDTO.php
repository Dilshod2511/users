<?php


namespace App\DTO\User;

use JsonSerializable;

class DrivingCreateDTO implements JsonSerializable
{



    public int $user_id;
    public string  $passport;
    public string $certificate;
    public string $employment_book;
    public string $tex_passport;


    public function __construct(

        int $user_id,
        string $passport,
        string $certificate,
        string $employment_book,
        string $tex_passport)
    {


        $this->passport=$passport;
        $this->user_id=$user_id;
        $this->certificate=$certificate;
        $this->employment_book=$employment_book;
        $this->tex_passport=$tex_passport;


    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

 
    /**
     * @return string
     */
    public function getPassport(): string
    {
        return $this->passport;
    }

 

    /**
     * @return string
     */
    public function getCertificate(): string
    {
        return $this->certificate;
    }



    /**
     * @return string
     */
    public function getEmploymentBook(): string
    {
        return $this->employment_book;
    }

  

    /**
     * @return string
     */
    public function getTexPassport(): string
    {
        return $this->tex_passport;
    }

  

    public function jsonSerialize(): array
    {
        return [
            "user_id" => $this->getUserId(),
            "passport" => $this->getPassport(),
            "certificate" => $this->getCertificate(),
            "employment_book" => $this->getEmploymentBook(),
            "tex_passport" => $this->getTexPassport(),
        ];
    }
}
