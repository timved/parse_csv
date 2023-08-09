<?php

declare(strict_types = 1);

namespace Model;

use Generator;

class CsvReader
{
    public static function extract(string $path): Generator
    {
        $file  = fopen($path, 'r');

        if (!empty($file)) {
            while (($line = fgetcsv(stream: $file, separator: ";")) !== false) {
                yield $line;
            }
        }
    }
}