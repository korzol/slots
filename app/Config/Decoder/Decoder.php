<?php
declare(strict_types=1);

namespace App\Config\Decoder;

use InvalidArgumentException;

class Decoder
{
    /**
     * @param string $json
     * @return array{tiles: array<string, int>, reels: array<int>, lines: array<int>, pays: array<int>}
     * @throws InvalidArgumentException
     */
    public static function decode(string $json): array
    {
        $config = json_decode($json, true);

        if($config)
        {
            return $config;
        }

        throw new InvalidArgumentException("Could not decode provided json. Make sure it's really json");
    }
}
