<?php

declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

use Model\CsvReader;
use Model\BaseCar;
use Model\MachineFactory;

$fileNme = '/usr/src/myapp/Исходные_данные_для_задания_с_машинами.csv';
function getCarList(string $fileNme): array
{
    $result = [];

    if ('csv' !== pathinfo($fileNme, PATHINFO_EXTENSION)) {
        throw new RuntimeException('Invalid format file');
    }

    $lines = CsvReader::extract($fileNme);

    $factory = new MachineFactory();

    foreach ($lines as $line) {

        if (count(array_diff_key(array_flip([0,1,2,3,4,5,6]), $line)) !== 0 ||
            !preg_match('/^\d+\.?\d?+$/', $line[5]) ||
            empty(pathinfo($line[3], PATHINFO_EXTENSION)) ||
            empty($line[1]) ||
            !in_array($line[0],BaseCar::CAR_TYPES)
        ) {
            continue;
        }

        $params = [
            'carType' => $line[0],
            'photoFileName' => $line[3],
            'brand' => $line[1],
            'carrying' => (float) $line[5],
        ];

        if (BaseCar::TYPE_CAR === $params['carType']) {
            if (empty($line[2])) {
                continue;
            }
            $params['passengerSeatsCount'] = (int) $line[2];
        }

        if (BaseCar::TYPE_TRUCK === $params['carType']) {
            $params['bodyWhl'] = $line[4];
        }

        if (BaseCar::TYPE_SPECMACHINE === $params['carType']) {
            $params['extra'] = $line[6];
        }

        $result[] = $factory->create($params);
    }

    return $result;

}

$machineList = getCarList($fileNme);

var_dump($machineList);