<?php

declare(strict_types = 1);

namespace Model;

class SpecMachine extends BaseCar
{
    public function __construct(
        protected string $carType,
        protected string $photoFileName,
        protected string $brand,
        protected float $carrying,
        private   string  $extra,
    )
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);
    }

    public function getExtra(): string
    {
        return $this->extra;
    }

}