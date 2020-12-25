<?php
declare(strict_types=1);

namespace App\Draw\Reels;

interface ReelsInterface
{
    /**
     * @return array{
     *     mysterySymbols: array{
     *         mysteryTile: int,
     *         toTile: int,
     *         tiles?: array{
     *             reel?: int,
     *             index?: int,
     *             sequence?: array{
     *                 int,
     *                 int,
     *                 int
     *             }
     *         }
     *     },
     *     reelsBuffer: array<int, array<int>>
     * }
     */
    public function spin(): array;
}
