<?php
declare(strict_types=1);

namespace tests\Draw\Analyzer;

use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    /**
     * @dataProvider dataLines
     * @param array<array<int>> $slots
     * @param array<int, array<int|string, int>> $expected
     */
//    public function testAnalyze(array $slots, array $expected): void
//    {
//        $lines = [
//            "lines" => [
//                [1,1,1,1,1],
//                [0,0,0,0,0],
//                [2,2,2,2,2],
//                [2,1,0,1,2],
//                [0,1,2,1,0],
//                [0,0,1,2,2],
//                [2,2,1,0,0],
//                [1,0,0,0,1],
//                [1,2,2,2,1],
//                [0,1,0,1,0]
//            ],
//        ];
//
//        $analyzer = new Analyzer();
//        $this->assertEquals($expected, $analyzer->analyze($slots));
//    }

    /**
     * @return array<string, array<int, array<int, array<int|string, int>>>>
     */
    public function dataLines(): array
    {
        return [
            'line1_1' => [
                [
                    [2, 2, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 0,
                        "length" => 5
                    ],
                ]
            ],
            'line1_2' => [
                [
                    [2, 2, 2, 1, 1],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line1_3' => [
                [
                    [1, 1, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line1_4' => [
                [
                    [1, 2, 2, 2, 1],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line1_5' => [
                [
                    [2, 2, 2, 2, 1],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line1_6' => [
                [
                    [1, 2, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line0_1' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line0_2' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line0_3' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 1, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line0_4' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 2, 1],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line0_5' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 2, 1],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line0_6' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 2, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 0,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line2_1' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line2_2' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line2_3' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [1, 1, 2, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line2_4' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 2, 1],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line2_5' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [2, 2, 2, 2, 1],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line2_6' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line3_1' => [
                [
                    [1, 2, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [2, 1, 3, 4, 2],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line3_2' => [
                [
                    [1, 2, 2, 4, 5],
                    [1, 2, 3, 3, 5],
                    [2, 1, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line3_3' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 4, 3, 2, 5],
                    [1, 1, 3, 4, 2],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line3_4' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 1, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line3_5' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [2, 1, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line3_6' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 1, 3, 4, 2],
                ],
                [
                    [
                        "lineIndex" => 3,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line4_1' => [
                [
                    [2, 3, 2, 4, 2],
                    [1, 2, 3, 2, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line4_2' => [
                [
                    [2, 3, 2, 4, 5],
                    [1, 2, 3, 4, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line4_3' => [
                [
                    [1, 3, 2, 4, 2],
                    [1, 3, 3, 2, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line4_4' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line4_5' => [
                [
                    [2, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line4_6' => [
                [
                    [1, 3, 2, 4, 2],
                    [1, 2, 3, 2, 5],
                    [1, 1, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 4,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line5_1' => [
                [
                    [2, 2, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line5_2' => [
                [
                    [2, 2, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line5_3' => [
                [
                    [1, 3, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line5_4' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 2, 1],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line5_5' => [
                [
                    [2, 2, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line5_6' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 2, 2, 4, 5],
                    [1, 1, 3, 2, 2],
                ],
                [
                    [
                        "lineIndex" => 5,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line6_1' => [
                [
                    [1, 3, 3, 2, 2],
                    [1, 3, 2, 4, 5],
                    [2, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line6_2' => [
                [
                    [1, 3, 3, 4, 5],
                    [1, 3, 2, 4, 5],
                    [2, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line6_3' => [
                [
                    [1, 3, 3, 2, 2],
                    [1, 3, 2, 4, 5],
                    [1, 3, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line6_4' => [
                [
                    [1, 3, 3, 2, 5],
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line6_5' => [
                [
                    [1, 3, 3, 2, 5],
                    [1, 3, 2, 4, 5],
                    [2, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line6_6' => [
                [
                    [1, 3, 3, 2, 2],
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 6,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line7_1' => [
                [
                    [1, 2, 2, 2, 5],
                    [2, 3, 3, 4, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 7,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line7_2' => [
                [
                    [1, 2, 2, 4, 5],
                    [2, 3, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 7,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line7_3' => [
                [
                    [1, 3, 2, 2, 5],
                    [1, 3, 3, 4, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 7,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line7_4' => [
                [
                    [1, 2, 2, 2, 5],
                    [1, 3, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 7,
                        "start" => 1,
                        "length" => 3
                    ],
                ]
            ],
            'line7_5' => [
                [
                    [1, 2, 2, 2, 5],
                    [2, 3, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 7,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line7_6' => [
                [
                    [1, 2, 2, 2, 5],
                    [1, 3, 3, 4, 2],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 1,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 7,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line8_1' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 3, 3, 4, 2],
                    [1, 2, 2, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 8,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line8_2' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 3, 3, 4, 2],
                    [1, 2, 2, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 8,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line8_3' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 3, 3, 4, 2],
                    [1, 3, 2, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 8,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line8_4' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 3, 3, 4, 5],
                    [1, 2, 2, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 8,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line8_5' => [
                [
                    [1, 2, 3, 4, 5],
                    [2, 3, 3, 4, 5],
                    [1, 2, 2, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 8,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line8_6' => [
                [
                    [1, 2, 3, 4, 5],
                    [1, 3, 3, 4, 2],
                    [1, 2, 2, 2, 5],
                ],
                [
                    [
                        "lineIndex" => 2,
                        "start" => 1,
                        "length" => 3
                    ],
                    [
                        "lineIndex" => 8,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
            'line9_1' => [
                [
                    [2, 3, 2, 4, 2],
                    [1, 2, 3, 2, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 0,
                        "length" => 5
                    ]
                ]
            ],
            'line9_2' => [
                [
                    [2, 3, 2, 4, 2],
                    [1, 2, 3, 4, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 0,
                        "length" => 3
                    ]
                ]
            ],
            'line9_3' => [
                [
                    [2, 3, 2, 4, 2],
                    [1, 3, 3, 2, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 2,
                        "length" => 3
                    ]
                ]
            ],
            'line9_4' => [
                [
                    [1, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 1,
                        "length" => 3
                    ]
                ]
            ],
            'line9_5' => [
                [
                    [2, 3, 2, 4, 5],
                    [1, 2, 3, 2, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 0,
                        "length" => 4
                    ]
                ]
            ],
            'line9_6' => [
                [
                    [1, 3, 2, 4, 2],
                    [1, 2, 3, 2, 5],
                    [1, 2, 3, 4, 5],
                ],
                [
                    [
                        "lineIndex" => 9,
                        "start" => 1,
                        "length" => 4
                    ]
                ]
            ],
        ];
    }
}
