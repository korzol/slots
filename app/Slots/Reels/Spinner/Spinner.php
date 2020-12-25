<?php
declare(strict_types=1);

namespace App\Slots\Reels\Spinner;

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
            $startIndex = rand(0, count($reel) - 3);
            $rows[$k] = [
                $reel[$startIndex],
                $reel[$startIndex + 1],
                $reel[$startIndex + 2]
            ];
        }

        return $rows;
    }
}
