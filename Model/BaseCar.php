<?php

declare(strict_types = 1);

namespace Model;

abstract class BaseCar extends MachineFactory
{
    public const TYPE_CAR = 'car';
    public const TYPE_TRUCK = 'truck';
    public const TYPE_SPECMACHINE = 'specMachine';
    public const CAR_TYPES = [
        self::TYPE_CAR,
        self::TYPE_TRUCK,
        self::TYPE_SPECMACHINE,
    ];

    public function __construct(
        protected string $carType,
        protected string $photoFileName,
        protected string $brand,
        protected float $carrying,
    )
    {
    }

    public function getCarType(): string
    {
        return $this->carType;
    }

    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getCarrying(): float
    {
        return $this->carrying;
    }

    public function getPhotoFileExt(): string
    {
        return pathinfo($this->photoFileName, PATHINFO_EXTENSION);
    }
}