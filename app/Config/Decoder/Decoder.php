<?php
declare(strict_types=1);

namespace App\Config\Decoder;

use InvalidArgumentException;

class Decoder
{
    /**
     * @param string $json
     * @return array{tiles: array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * }, reels: array<array<int, array<int>>>, lines: array<array<int>>, pays: array<int>}
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
