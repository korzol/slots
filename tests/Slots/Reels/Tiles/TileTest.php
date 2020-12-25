<?php
declare(strict_types=1);

namespace tests\Draw\Reels\Tiles;

use App\Slots\Reels\Tiles\Tile;
use Exception;
use \PHPUnit\Framework\TestCase;

class TileTest extends TestCase
{
    /**
     * @param array{
     *     array{
     *         id: int, type: string
     *     }
     * } $tiles
     * @dataProvider tilesData
     */
    public function testGetMysteryTile(array $tiles): void
    {
        $tile = new Tile($tiles);

        $this->assertEquals(10, $tile->getMysteryTile());
    }

    public function testNoMysteryTile(): void
    {
        $this->expectException(Exception::class);

        $tiles = [
            ["id" => 1,  "type" => "normal"],
            ["id" => 2,  "type" => "normal"],
            ["id" => 3,  "type" => "normal"],
            ["id" => 4,  "type" => "normal"],
            ["id" => 5,  "type" => "normal"],
            ["id" => 6,  "type" => "normal"],
            ["id" => 7,  "type" => "normal"],
            ["id" => 8,  "type" => "normal"],
            ["id" => 9,  "type" => "normal"],
            ["id" => 10, "type" => "normal"],
        ];

        $tile = new Tile($tiles);

        $tile->getMysteryTile();
    }

    /**
     * @param array{
     *     array{
     *         id: int, type: string
     *     }
     * } $tiles
     * @dataProvider tilesData
     */
    public function testRandomTile(array $tiles): void
    {
        $tile = new Tile($tiles);
        $randomTile = $tile->randomTile();

        $this->assertTrue($randomTile >= 1 && $randomTile <= 9);
    }

    /**
     * @param array{
     *     array{
     *         id: int, type: string
     *     }
     * } $tiles
     * @dataProvider tilesData
     */
    public function testFindMysteryTilesInArray(array $tiles): void
    {
        $reelsBufferWithMysteryTiles = [
            [1, 3, 5],
            [4, 6, 7],
            [10, 10, 1],
            [3, 4, 6],
            [1, 9, 10]
        ];

        $tile = new Tile($tiles);
        $foundMysteryTilesPositions = $tile->findMysteryTilesInArray($reelsBufferWithMysteryTiles);

        $realMysteryTilesPositions = [
            [
                'reel' => 2,
                'index' => 0,
                'sequence' => [
                    10, 10, 1
                ]
            ],
            [
                'reel' => 2,
                'index' => 1,
                'sequence' => [
                    10, 10, 1
                ]
            ],
            [
                'reel' => 4,
                'index' => 2,
                'sequence' => [
                    1, 9, 10
                ]
            ],
        ];

        $this->assertEquals($realMysteryTilesPositions, $foundMysteryTilesPositions);
    }

    /**
     * @return array{
     *     array{
     *         tiles: array{
     *             array{
     *                 id: int, type: string
     *             }
     *         }
     *     }
     * }
     */
    public function tilesData(): array
    {
        return [
            [
            "tiles" => [
                ["id" => 1,  "type" => "normal"],
                ["id" => 2,  "type" => "normal"],
                ["id" => 3,  "type" => "normal"],
                ["id" => 4,  "type" => "normal"],
                ["id" => 5,  "type" => "normal"],
                ["id" => 6,  "type" => "normal"],
                ["id" => 7,  "type" => "normal"],
                ["id" => 8,  "type" => "normal"],
                ["id" => 9,  "type" => "normal"],
                ["id" => 10, "type" => "mystery"]
            ],
            ]
        ];
    }
}
