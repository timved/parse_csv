<?php

declare(strict_types = 1);

namespace Model;

class Car extends BaseCar
{
    public function __construct(
        protected string $carType,
        protected string  $photoFileName,
        protected string  $brand,
        protected float  $carrying,
        private int       $passengerSeatsCount,
    )
    {
        var_dump($brand);
        parent::__construct($carType, $photoFileName, $brand, $carrying);
    }

    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }
}