<?php
declare(strict_types=1);

namespace App\Slots\Reels\Spinner;

use App\Slots\Reels\Spinner\Randomizer\Randomizer;
use App\Slots\Reels\Spinner\Seeder\Seeder;

class Spinner
{
    /**
     * @var array<int, array<int>> $reels
     */
    private array $reels;

    /**
     * Spinner constructor.
     * @param array<int, array<int>> $reels
     */
    public function __construct(array $reels)
    {
        $this->reels = $reels;
    }

    /**
     * @return array<int, array<int>>
     */
    public function fillInArray(): array
    {
        $rows = [];
        foreach ($this->reels as $k => $reel) {
            $rows[$k] = Seeder::seed($reel, Randomizer::run($reel));
        }

        return $rows;
    }
}
