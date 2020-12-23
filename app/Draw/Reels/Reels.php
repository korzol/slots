<?php
declare(strict_types=1);

namespace App\Draw\Reels;

use App\Draw\Reels\Spinner\Spinner;
use App\Draw\Reels\Tiles\Tile;
use Exception;

class Reels
{
    /**
     * @var array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * } $tiles
     */
    private array $tiles;

    /**
     * @var array<int, array<int>> $reels
     */
    private array $reels;

    /**
     * Reels constructor.
     * @param array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * } $tiles
     * @param array<int, array<int>> $reels
     */
    public function __construct(array $tiles, array $reels)
    {
        $this->tiles = $tiles;
        $this->reels = $reels;
    }

    /**
     * @return array{
     *     mysterySymbols: array{
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
    public function spin(): array
    {
        $tile = new Tile($this->tiles);
        $reels = new Spinner($this->reels);

        try {
            $reelsBuffer = $reels->fillInArray();

            return [
                'mysterySymbols' => [
                    'toTile' => $tile->randomTile(),
                    'tiles' => $tile->findMysteryTilesInArray($reelsBuffer)
                ],
                'reelsBuffer' => $reelsBuffer
            ];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
