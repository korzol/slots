<?php
declare(strict_types=1);

namespace tests\Slots\Finance\Analyzer;

use App\Slots\Finance\Analyzer\Analyzer;
use \PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    /**
     * @dataProvider paysData
     * @param array<int, array<int, int, int>> $pays
     */
    public function testAnalyzeOneLine(array $pays): void
    {
        $report = [
            'updatedReelsBuffer' => [
                [1, 3, 5],
                [4, 6, 7],
                [7, 1, 1],
                [3, 7, 6],
                [1, 9, 7]
            ],
            'matchedLines' => [
                'realized_lines' => [
                    3 => [
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
                ]
            ],
        ];

        $expectedResult = [
            [
                'line' => [
                    'id' => 3,
                    'tile' => 7,
                    'count' => 3,
                    'ratio' => 10
                ]
            ]
        ];

        $analyzer = new Analyzer($pays, $report);
        $this->assertEquals($expectedResult, $analyzer->analyze());
    }

    /**
     * @dataProvider paysData
     * @param array<int, array<int, int, int>> $pays
     */
    public function testAnalyzeTwoLines(array $pays): void
    {
        $report = [
            'updatedReelsBuffer' => [
                [1, 6, 5],
                [4, 6, 7],
                [7, 6, 1],
                [3, 7, 6],
                [1, 9, 7]
            ],
            'matchedLines' => [
                'realized_lines' => [
                    0 => [
                        [
                            "coords" => [
                                "reel" => 0,
                                "tile" => 1
                            ],
                            "value" => 6,
                        ],
                        [
                            "coords" => [
                                "reel" => 1,
                                "tile" => 1
                            ],
                            "value" => 6,
                        ],
                        [
                            "coords" => [
                                "reel" => 2,
                                "tile" => 1
                            ],
                            "value" => 6,
                        ],
                    ],
                    3 => [
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
                ]
            ],
        ];

        $expectedResult = [
            [
                'line' => [
                    'id' => 0,
                    'tile' => 6,
                    'count' => 3,
                    'ratio' => 20
                ]
            ],
            [
                'line' => [
                    'id' => 3,
                    'tile' => 7,
                    'count' => 3,
                    'ratio' => 10
                ]
            ]
        ];

        $analyzer = new Analyzer($pays, $report);
        $this->assertEquals($expectedResult, $analyzer->analyze());
    }

    /**
     * @return array{
     *     pays: array<int, array<int, array<int, int, int>>>
     * }
     */
    public function paysData(): array
    {
        return [
            "pays" => [
                [
                    [1, 5, 500],
                    [1, 4, 300],
                    [1, 3, 100],
                    [2, 5, 400],
                    [2, 4, 200],
                    [2, 3,  60],
                    [3, 5, 300],
                    [3, 4, 100],
                    [3, 3,  40],
                    [4, 5, 300],
                    [4, 4, 100],
                    [4, 3,  40],
                    [5, 5, 200],
                    [5, 4,  40],
                    [5, 3,  20],
                    [6, 5, 200],
                    [6, 4,  40],
                    [6, 3,  20],
                    [7, 5, 100],
                    [7, 4,  20],
                    [7, 3,  10],
                    [8, 5, 100],
                    [8, 4,  20],
                    [8, 3,  10],
                    [9, 5, 100],
                    [9, 4,  20],
                    [9, 3,  10],
                ]
            ]
        ];
    }
}
