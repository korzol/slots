<?php
declare(strict_types=1);

namespace tests\Slots\Reels\Spinner\Seeder;

use App\Slots\Reels\Spinner\Seeder\Seeder;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SeederTest extends TestCase
{
    public function testCanSeed(): void
    {
        $reel = [6,6,6,3,10,10,7,7,7,4,4,4,4,8,8,8,2,2,2,9,9,10,4,4,9,9,9,8,8,8,9,9,9,6,6,6,5,5,5,5,1,1];
        $startIndex = 4;

        $expectedArray = [10, 10, 7];

        $this->assertEquals($expectedArray, Seeder::seed($reel, $startIndex));
    }

    public function testCantSeed(): void
    {
        $reel = [6,6,6,7];
        $startIndex = 4;

        $this->expectException(InvalidArgumentException::class);

        Seeder::seed($reel, $startIndex);
    }
}
