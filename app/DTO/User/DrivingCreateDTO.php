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
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getPassport(): string
    {
        return $this->passport;
    }

    /**
     * @param string $passport
     */
    public function setPassport(string $passport): void
    {
        $this->passport = $passport;
    }

    /**
     * @return string
     */
    public function getCertificate(): string
    {
        return $this->certificate;
    }

    /**
     * @param string $certificate
     */
    public function setCertificate(string $certificate): void
    {
        $this->certificate = $certificate;
    }

    /**
     * @return string
     */
    public function getEmploymentBook(): string
    {
        return $this->employment_book;
    }

    /**
     * @param string $employment_book
     */
    public function setEmploymentBook(string $employment_book): void
    {
        $this->employment_book = $employment_book;
    }

    /**
     * @return string
     */
    public function getTexPassport(): string
    {
        return $this->tex_passport;
    }

    /**
     * @param string $tex_passport
     */
    public function setTexPassport(string $tex_passport): void
    {
        $this->tex_passport = $tex_passport;
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
