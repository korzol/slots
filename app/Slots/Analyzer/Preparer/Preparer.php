<?php
declare(strict_types=1);

namespace App\Slots\Analyzer\Preparer;

class Preparer
{
    /**
     * @param array<int, array<int>> $reelsBuffer
     * @param int $mysteryTile
     * @param int $toTile
     * @return array<int, array<int>>
     */
    public static function replaceMysteryTile(array $reelsBuffer, int $mysteryTile, int $toTile): array
    {
        foreach ($reelsBuffer as $index => $reel)
        {
            foreach ($reel as $k => $tile)
            {
                if ($tile == $mysteryTile)
                {
                    $reelsBuffer[$index][$k] = $toTile;
                }
            }
        }

        return $reelsBuffer;
    }
}
