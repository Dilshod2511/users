<?php


namespace App\DTO\User;
use JsonSerializable;

class VehicleCreateDTO implements JsonSerializable
{

    public string $truck_number;
    public   $truck_brand;
    public string $user_id;
    public string $year;
    public  $condition;
    public string $fuel;
    public string $number;
    public string $capacity;

    public function __construct(

        string $truck_number,
        $truck_brand,
        string $user_id,
        string $year,
         $condition,
        string $fuel,
        string $number,
        string $capacity)

    {

        $this->truck_number=$truck_number;
        $this->truck_brand=$truck_brand;
        $this->user_id=$user_id;
        $this->year=$year;
        $this->condition=$condition;
        $this->fuel=$fuel;
        $this->number=$number;
        $this->capacity=$capacity;

    }

    /**
     * @return string
     */


    /**
     * @return int
     */
    public function getTruckNumber(): string
    {
        return $this->truck_number;
    }

   

    /**
     * @return mixed
     */
    public function getTruckBrand()
    {
        return $this->truck_brand;
    }


    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

   

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

  

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

 
    /**
     * @return string
     */
    public function getFuel(): string
    {
        return $this->fuel;
    }

 

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    

    /**
     * @return string
     */
    public function getCapacity(): string
    {
        return $this->capacity;
    }

   

    public function jsonSerialize(): array
    {
        return [

            'truck_number' =>$this->getTruckNumber(),
            'truck_brand' => $this->getTruckBrand(),
            'user_id' => $this->getUserId(),
            'year' =>$this->getYear(),
            'condition' => $this->getCondition(),
            'fuel' => $this->getFuel(),
            'number' => $this->getNumber(),
            'capacity' => $this->getCapacity(),
        ];
    }

}
