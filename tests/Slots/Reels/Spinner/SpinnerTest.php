<?php
declare(strict_types=1);

namespace tests\Draw\Reels\Spinner;

use App\Slots\Reels\Spinner\Spinner;
use \PHPUnit\Framework\TestCase;

class SpinnerTest extends TestCase
{
    /**
     * @param array<int, array<int, int>> $reels
     * @dataProvider reelsData
     */
    public function testFillInArray(array $reels): void
    {
        $spinner = new Spinner($reels);
        $reelsBuffer = $spinner->fillInArray();

        $this->assertCount(5, $reelsBuffer);
        $this->assertCount(3, $reelsBuffer[0]);
        $this->assertCount(3, $reelsBuffer[1]);
        $this->assertCount(3, $reelsBuffer[2]);
        $this->assertCount(3, $reelsBuffer[3]);
        $this->assertCount(3, $reelsBuffer[4]);

        $this->assertTrue(array_sum($reelsBuffer[0]) <= 50);
        $this->assertTrue(array_sum($reelsBuffer[1]) <= 50);
        $this->assertTrue(array_sum($reelsBuffer[2]) <= 50);
        $this->assertTrue(array_sum($reelsBuffer[3]) <= 50);
        $this->assertTrue(array_sum($reelsBuffer[4]) <= 50);
    }

    /**
     * @return array<string, array<int, array<int, array<int, int>>>>
     */
    public function reelsData(): array
    {
        return [
            "reels" => [
                [
                    [5,5,10,10,3,3,9,9,9,7,7,7,7,7,8,8,8,8,8,2,2,2,7,7,7,7,7,2,2,2,8,8,8,8,8,4,4,4,5,5,9,9,9,9,9,9,9,7,7,7,7,7,2,2,2,10,10,10,10,10,4,4,4,6],
                    [6,5,5,5,5,8,8,10,6,6,1,1,1,1,9,9,9,9,3,3,3,7,7,7,10,10,10,10,3,3,3,6,2,2,2,8,8,8,8,4,4,4,4,7,7,7,9,9,9,5,5,6,6,6,6,6,1,1,1,1,9,9,9,9,3,3,3,10,10,10,8,8,8,8,3,3,3,6,6],
                    [6,6,6,3,10,10,7,7,7,4,4,4,4,8,8,8,2,2,2,9,9,10,4,4,9,9,9,8,8,8,9,9,9,6,6,6,5,5,5,5,1,1],
                    [7,7,7,10,8,8,8,8,8,5,5,5,5,1,1,1,1,9,9,9,6,6,9,9,7,7,7,7,3,3,3,6,3,10,10,7,7,7,4,4,4,4,8,8,8,2],
                    [8,8,2,2,2,7,6,6,4,10,4,4,9,9,9,8,8,8,8,8,2,2,2,7,7,7,3,3,3,10,10,6,6,6,6,5,5,5,5,8,8,8,8,5,5,5,2,8,8,7,7,7,7,3,3,3,3,6,6,6,6,4,4,4,10,9,9,9]
                ]
            ],
        ];
    }
}
