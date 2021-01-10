<?php
declare(strict_types=1);

namespace App\Slots\Reels\Spinner\Randomizer;

use InvalidArgumentException;

class Randomizer
{
    /**
     * @param array<int> $reel
     * @return int
     */
    public static function run(array $reel): int
    {
        if (count($reel) >= 3) {
            return rand(0, count($reel) - 3);
        }

        throw new InvalidArgumentException("Insufficient number of elements in source array.");
    }
}
