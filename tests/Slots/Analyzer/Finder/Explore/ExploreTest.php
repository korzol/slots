<?php
declare(strict_types=1);

namespace tests\Draw\Analyzer\Finder\Explore;

use App\Slots\Analyzer\Finder\Explore\Explore;
use \PHPUnit\Framework\TestCase;

class ExploreTest extends TestCase
{
    public function testRunSingleLine(): void
    {
        $collection = [
            [
                [
                    'coords' => [
                        'reel' => 0,
                        'tile' => 2,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 1,
                        'tile' => 1,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 2,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 3,
                        'tile' => 1,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 4,
                        'tile' => 2,
                    ],
                    'value' => 5,
                ],
            ]
        ];

        $expectedCollection = [
            'realized_lines' => [
                [
                    [
                        'coords' => [
                            'reel' => 0,
                            'tile' => 2,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 1,
                            'tile' => 1,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 2,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 3,
                            'tile' => 1,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 4,
                            'tile' => 2,
                        ],
                        'value' => 5,
                    ],
                ]
            ]
        ];

        $explore = new Explore($collection);

        $this->assertEquals($expectedCollection, $explore->run());
    }

    public function testRunTwoLines(): void
    {
        $collection = [
            [
                [
                    'coords' => [
                        'reel' => 0,
                        'tile' => 2,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 1,
                        'tile' => 1,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 2,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 3,
                        'tile' => 1,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 4,
                        'tile' => 2,
                    ],
                    'value' => 5,
                ],
            ],
            [
                [
                    'coords' => [
                        'reel' => 0,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 1,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 2,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 3,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 4,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
            ]
        ];

        $expectedCollection = [
            'realized_lines' => [
                [
                    [
                        'coords' => [
                            'reel' => 0,
                            'tile' => 2,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 1,
                            'tile' => 1,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 2,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 3,
                            'tile' => 1,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 4,
                            'tile' => 2,
                        ],
                        'value' => 5,
                    ],
                ],
                [
                    [
                        'coords' => [
                            'reel' => 0,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 1,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 2,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 3,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 4,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                ]
            ]
        ];

        $explore = new Explore($collection);

        $this->assertEquals($expectedCollection, $explore->run());
    }

    public function testRunIncompleteLine(): void
    {
        $collection = [
            [
                [
                    'coords' => [
                        'reel' => 0,
                        'tile' => 2,
                    ],
                    'value' => 2,
                ],
                [
                    'coords' => [
                        'reel' => 1,
                        'tile' => 1,
                    ],
                    'value' => 1,
                ],
                [
                    'coords' => [
                        'reel' => 2,
                        'tile' => 0,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 3,
                        'tile' => 1,
                    ],
                    'value' => 5,
                ],
                [
                    'coords' => [
                        'reel' => 4,
                        'tile' => 2,
                    ],
                    'value' => 5,
                ],
            ]
        ];

        $expectedCollection = [
            'realized_lines' => [
                [
                    [
                        'coords' => [
                            'reel' => 2,
                            'tile' => 0,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 3,
                            'tile' => 1,
                        ],
                        'value' => 5,
                    ],
                    [
                        'coords' => [
                            'reel' => 4,
                            'tile' => 2,
                        ],
                        'value' => 5,
                    ],
                ]
            ]
        ];

        $explore = new Explore($collection);

        $this->assertEquals($expectedCollection, $explore->run());
    }
}
