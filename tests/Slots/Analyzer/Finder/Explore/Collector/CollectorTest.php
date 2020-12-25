<?php
declare(strict_types=1);

namespace tests\Draw\Analyzer\Finder\Explore\Collector;

use App\Slots\Analyzer\Finder\Explore\Collector\Collector;
use \PHPUnit\Framework\TestCase;

class CollectorTest extends TestCase
{
    public function testAddNewTile(): void
    {
        $tile = [
            'coords' => [
                'reel' => 2,
                'tile' => 2,
            ],
            'value' => 5,
        ];

        $expectedCollection = [
            [
                'coords' => [
                    'reel' => 2,
                    'tile' => 2,
                ],
                'value' => 5,
            ]
        ];

        $collector = new Collector();
        $collector->addTile($tile);

        $this->assertEquals($expectedCollection, $collector->getCollection());
    }

    public function testAddExistingTile(): void
    {
        $tile = [
            'coords' => [
                'reel' => 2,
                'tile' => 2,
            ],
            'value' => 5,
        ];

        $expectedCollection = [
            [
                'coords' => [
                    'reel' => 2,
                    'tile' => 2,
                ],
                'value' => 5,
            ]
        ];

        $collector = new Collector();
        $collector->addTile($tile);
        $collector->addTile($tile);

        $this->assertEquals($expectedCollection, $collector->getCollection());
    }

    public function testAddSecondTile(): void
    {
        $tile1 = [
            'coords' => [
                'reel' => 2,
                'tile' => 2,
            ],
            'value' => 5,
        ];

        $tile2 = [
            'coords' => [
                'reel' => 3,
                'tile' => 1,
            ],
            'value' => 7,
        ];

        $expectedCollection = [
            [
                'coords' => [
                    'reel' => 2,
                    'tile' => 2,
                ],
                'value' => 5,
            ],
            [
                'coords' => [
                    'reel' => 3,
                    'tile' => 1,
                ],
                'value' => 7,
            ],
        ];

        $collector = new Collector();
        $collector->addTile($tile1);
        $collector->addTile($tile2);

        $this->assertEquals($expectedCollection, $collector->getCollection());
    }
}
