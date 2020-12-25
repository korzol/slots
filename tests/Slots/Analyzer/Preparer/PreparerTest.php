<?php
declare(strict_types=1);

namespace tests\Draw\Analyzer\Preparer;

use App\Slots\Analyzer\Preparer\Preparer;
use \PHPUnit\Framework\TestCase;

class PreparerTest extends TestCase
{
    public function testReplaceMysteryTile(): void
    {
        $reelBuffer = [
            [
                10, 10, 1
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
                10, 6, 10
            ]
        ];

        $processedReelBuffer = [
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

        $this->assertEquals($processedReelBuffer, Preparer::replaceMysteryTile($reelBuffer, 10, 7));
    }
}
