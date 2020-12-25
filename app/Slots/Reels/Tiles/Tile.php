<?php
declare(strict_types=1);

namespace App\Slots\Reels\Tiles;

use Exception;

class Tile
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
     * Tile constructor.
     * @param array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * } $tiles
     */
    public function __construct(array $tiles)
    {
        $this->tiles = $tiles;
    }

    public function randomTile(): int
    {
        $index = rand(0, count($this->tiles) - 1);

        $randomTile = $this->tiles[$index]['id'];

        if($this->tiles[$index]['type'] == 'mystery')
        {
            $randomTile = $this->randomTile();
        }

        return $randomTile;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function getMysteryTile(): int
    {
        foreach ($this->tiles as $tile)
        {
            if (strtolower($tile["type"]) == 'mystery')
            {
                return $tile['id'];
            }
        }

        throw new Exception("No mystery tile found. Make sure it is defined");
    }

    /**
     * @param array<int, array<int>> $reelsBuffer
     * @return array{
     *     reel?: int,
     *     index?: int,
     *     sequence?: array{
     *         int,
     *         int,
     *         int
     *     }
     * }
     */
    public function findMysteryTilesInArray(array $reelsBuffer): array
    {
        // TODO: probably better refactor it sometime later
        try {
            $mysteryTilesPositions = [];
            $mysteryTile = $this->getMysteryTile();

            foreach ($reelsBuffer as $reel => $sequence) {
                foreach (array_keys($sequence, $mysteryTile) as $index) {
                    $mysteryTilesPositions[] = [
                        'reel' => $reel,
                        'index' => $index,
                        'sequence' => $sequence,
                    ];
                }
            }

            return $mysteryTilesPositions;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
