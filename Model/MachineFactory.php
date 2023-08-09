<?php

declare(strict_types = 1);

namespace Model;

use RuntimeException;

class MachineFactory
{
    public function create(array $params): BaseCar
    {
        try {
            $machine = "Model\\" . ucfirst($params['carType']);

            return  new $machine(...$params);
        } catch (\Exception $e) {
            // log errors
        }
    }
}