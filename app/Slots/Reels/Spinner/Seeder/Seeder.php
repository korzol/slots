<?php
declare(strict_types=1);

namespace App\Slots\Reels\Spinner\Seeder;

use InvalidArgumentException;

class Seeder
{
    /**
     * @param array<int> $reel
     * @param int $startIndex
     * @return array<int>
     */
    public static function seed(array $reel, int $startIndex): array
    {
        if ($startIndex <= (count($reel) - 3)) {
            return [
                $reel[$startIndex],
                $reel[$startIndex + 1],
                $reel[$startIndex + 2]
            ];
        }

        throw new InvalidArgumentException("Array index out of bound");
    }
}
