<?php


namespace App\DTO\User;
use JsonSerializable;

class UserCreateFormDTO implements JsonSerializable
{


    public string $workplace;
    public string $area_code;
    public   $date_of_membership;
    public string $photo;
    public string $distance;
    public string $work_seniority;
    public string $awards;
    public string $driver_category;

    public function __construct(
        string $workplace,
        string $area_code,
        $date_of_membership,
        string $photo,
        string $distance,
        string $work_seniority,
        string $awards,
        string $driver_category)
    {
        $this->workplace=$workplace;
        $this->area_code=$area_code;
        $this->date_of_membership=$date_of_membership;
        $this->photo=$photo;
        $this->distance=$distance;
        $this->work_seniority=$work_seniority;
        $this->awards=$awards;
        $this->driver_category=$driver_category;
    }



    /**
     * @return string
     */
    public function getDistance(): string
    {
        return $this->distance;
    }

 

    /**
     * @return string
     */
    public function getWorkplace(): string
    {
        return $this->workplace;
    }

   

    /**
     * @return int
     */
    public function getAreaCode(): string
    {
        return $this->area_code;
    }

  

    /**
     * @return mixed
     */
    public function getDateOfMembership()
    {
        return $this->date_of_membership;
    }

 

    /**
     * @return string
     */
    public function getWorkSeniority(): string
    {
        return $this->work_seniority;
    }

 

    /**
     * @return string
     */
    public function getAwards(): string
    {
        return $this->awards;
    }



    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

 

    /**
     * @return string
     */
    public function getDriverCategory(): string
    {
        return $this->driver_category;
    }



    public function jsonSerialize(): array
    {
        return [
           'workplace' => $this->getWorkplace(),
           'area_code' =>$this->getAreaCode(),
           'date_of_membership' => $this->getDateOfMembership(),
        'photo' => $this->getPhoto(),
         'distance' =>$this->getDistance(),
          'work_seniority' => $this->getWorkplace(),
        'awards' => $this->getAwards(),
         'driver_category' => $this->getDriverCategory(),
        ];
    }


}
