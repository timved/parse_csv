<?php

declare(strict_types = 1);

namespace Model;

class Truck extends BaseCar
{
    private int $bodyLength;
    private int $bodyWidth;
    private int $bodyHeight;
    public function __construct(
        protected string $carType,
        protected string $photoFileName,
        protected string $brand,
        protected float $carrying,
        string $bodyWhl,
    )
    {
        parent::__construct($carType, $photoFileName, $brand, $carrying);

        $this->parseBody($bodyWhl);
    }

    private function parseBody(string $body): void
    {
        $data = explode("x", $body);

        $this->bodyLength = (int) ($data[0] ?? null);
        $this->bodyWidth = (int) ($data[1] ?? null);
        $this->bodyHeight = (int) ($data[2] ?? null);
    }

    public function getBodyLength(): int
    {
        return $this->bodyLength;
    }

    public function getBodyWidth(): int
    {
        return $this->bodyWidth;
    }

    public function getBodyHeight(): int
    {
        return $this->bodyHeight;
    }

    public function getBodyVolume(): int
    {
        return $this->bodyLength * $this->bodyWidth * $this->bodyHeight;
    }

}