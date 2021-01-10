<?php
declare(strict_types=1);

namespace tests\Slots\Reels\Spinner\Randomizer;

use App\Slots\Reels\Spinner\Randomizer\Randomizer;
use InvalidArgumentException;
use \PHPUnit\Framework\TestCase;

class RandomizerTest extends TestCase
{
    public function testCanGenerate(): void
    {
        $reel = [1,2,3,4,5,6,7];

        $this->assertContains(Randomizer::generate($reel), array_keys($reel));
    }

    public function testCantGenerate(): void
    {
        $reel = [1,2];

        $this->expectException(InvalidArgumentException::class);

        Randomizer::generate($reel);
    }
}
