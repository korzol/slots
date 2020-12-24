<?php
declare(strict_types=1);

namespace tests\Draw\Analyzer\Collector;

use App\Draw\Analyzer\Collector\Collector;
use \PHPUnit\Framework\TestCase;

class CollectorTest extends TestCase
{
    public function testCollect(): void
    {
        // Test over only few ones
        $lines = [
            "lines" => [
                [1,1,1,1,1],
                [2,1,0,1,2],

            ],
        ];

        /*
         * [7, 3, 7, 1, 7]
         * [7, 5, 8, 7, 6]
         * [1, 6, 9, 8, 7]
         */
        $reelsBuffer = [
            [
                7, 7, 1
            ],
            [
                3, 5, 6
            ],
            [
                7, 8, 9
            ],
            [
                1, 7, 8
            ],
            [
                7, 6, 7
            ]
        ];

        $collection = Collector::collect($lines['lines'], $reelsBuffer);

        $exampleCollection = [
            [
                [
                    "coords" => [
                        "reel" => 0,
                        "tile" => 1
                    ],
                    "value" => 7,
                ],
                [
                    "coords" => [
                        "reel" => 1,
                        "tile" => 1
                    ],
                    "value" => 5,
                ],
                [
                    "coords" => [
                        "reel" => 2,
                        "tile" => 1
                    ],
                    "value" => 8,
                ],
                [
                    "coords" => [
                        "reel" => 3,
                        "tile" => 1
                    ],
                    "value" => 7,
                ],
                [
                    "coords" => [
                        "reel" => 4,
                        "tile" => 1
                    ],
                    "value" => 6,
                ],
            ],
            [
                [
                    "coords" => [
                        "reel" => 0,
                        "tile" => 2
                    ],
                    "value" => 1,
                ],
                [
                    "coords" => [
                        "reel" => 1,
                        "tile" => 1
                    ],
                    "value" => 5,
                ],
                [
                    "coords" => [
                        "reel" => 2,
                        "tile" => 0
                    ],
                    "value" => 7,
                ],
                [
                    "coords" => [
                        "reel" => 3,
                        "tile" => 1
                    ],
                    "value" => 7,
                ],
                [
                    "coords" => [
                        "reel" => 4,
                        "tile" => 2
                    ],
                    "value" => 7,
                ],
            ],
        ];

        $this->assertEquals($exampleCollection, $collection);
    }
}
