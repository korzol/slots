<?php
declare(strict_types=1);

namespace App\Draw\Analyzer\Collector;

class Collector
{
    /*
     * @param array<array<int>> $lines
     * @param array<int, array<int>> $reelsBuffer
     * @return array{
     *     array{
     *         int: array{
     *             coords: array{
     *                 reel: int,
     *                 tile: int
     *             },
     *             value: int
     *         }
     *     }
     * }
     */
    /**
     * @param array<array<int>> $lines
     * @param array<int, array<int>> $reelsBuffer
     * @return array<array<int, array{coords: array{reel: int, tile: int}, value: int}>>
     */
    public static function collect(array $lines, array $reelsBuffer): array
    {
        $collection = [[]];
        foreach ($lines as $k => $line)
        {
            foreach ($line as $reel => $tile)
            {
                $collection[$k][] = [
                    "coords" => [
                        "reel" => (int)$reel,
                        "tile" => $tile
                    ],
                    "value" => $reelsBuffer[$reel][$tile],
                ];
            }
        }

        return $collection;
    }
}
