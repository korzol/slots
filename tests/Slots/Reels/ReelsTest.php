<?php
declare(strict_types=1);

namespace tests\Reels;

use \PHPUnit\Framework\TestCase;

class ReelsTest extends TestCase
{
    /**
     * @dataProvider reelsData
     * @param array<int, array<int, int>> $reels
     */
//    public function testGenerateSlotData(array $reels): void
//    {
//        $slots = new Reels($reels);
//        $slotsData = $slots->spin();
//
//        $this->assertCount(3, $slotsData);
//        $this->assertCount(5, $slotsData[0]);
//        $this->assertCount(5, $slotsData[1]);
//        $this->assertCount(5, $slotsData[2]);
//    }

    /**
     * Test that generated slots are come from real reels array.
     * Unfortunately it was not pointed out what logic should be behind this method.
     * And different generation methods may lead to different results.
     * So I chose this one - linear. Choosing any three consecutive values.
     * The end of the array is not closed at the beginning.
     * @dataProvider reelsData
     * @param array<int, array<int, int>> $reels
     */
    /*public function testVerifySlotDataRealness(array $reels): void
    {
        $slots = new Reels($reels);
        $slotsData = $slots->spin();

        $slotsData = [
            [2, 2, 2],
            [5, 5, 5],
            [6, 6, 6],
            [7, 7, 7],
            [2, 2, 2],
        ];

        $validity = [];
        foreach($reels as $k => $reel)
        {
            for($i = 0; $i < count($reel); ++$i )
            {
                $validity[$k] = false;
                if(
                    $reels[$k][$i] == $slotsData[$k][0] &&
                    $reels[$k][$i + 1] == $slotsData[$k][1] &&
                    $reels[$k][$i + 2] == $slotsData[$k][2]
                )
                {
                    $validity[$k] = true;
                }
            }
        }

        $this->assertEquals(
            [true, true, true, true, true],
            $validity
        );
    }*/

    public function testTest(): void
    {

    }

    /**
     * @return array<int, array<int, int>>
     */
    public function reelsData(): array
    {
        return [
            [5,5,10,10,3,3,9,9,9,7,7,7,7,7,8,8,8,8,8,2,2,2,7,7,7,7,7,2,2,2,8,8,8,8,8,4,4,4,5,5,9,9,9,9,9,9,9,7,7,7,7,7,2,2,2,10,10,10,10,10,4,4,4,6],
            [6,5,5,5,5,8,8,10,6,6,1,1,1,1,9,9,9,9,3,3,3,7,7,7,10,10,10,10,3,3,3,6,2,2,2,8,8,8,8,4,4,4,4,7,7,7,9,9,9,5,5,6,6,6,6,6,1,1,1,1,9,9,9,9,3,3,3,10,10,10,8,8,8,8,3,3,3,6,6],
            [6,6,6,3,10,10,7,7,7,4,4,4,4,8,8,8,2,2,2,9,9,10,4,4,9,9,9,8,8,8,9,9,9,6,6,6,5,5,5,5,1,1],
            [7,7,7,10,8,8,8,8,8,5,5,5,5,1,1,1,1,9,9,9,6,6,9,9,7,7,7,7,3,3,3,6,3,10,10,7,7,7,4,4,4,4,8,8,8,2],
            [8,8,2,2,2,7,6,6,4,10,4,4,9,9,9,8,8,8,8,8,2,2,2,7,7,7,3,3,3,10,10,6,6,6,6,5,5,5,5,8,8,8,8,5,5,5,2,8,8,7,7,7,7,3,3,3,3,6,6,6,6,4,4,4,10,9,9,9],
        ];
    }
}
