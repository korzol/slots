<?php
declare(strict_types=1);

namespace App\Slots\Finance\Calculator;

class Calculator
{
    /**
     * @var array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>
     */
    private array $lines;

    /**
     * Calculator constructor.
     * @param array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}> $lines
     */
    public function __construct(array $lines)
    {
        $this->lines = $lines;
    }

    public function calculate(): int
    {
        $profit = 0;
        foreach ($this->lines as $line) {
            // $profit = stake / paylines * ratio;
            // 100 - cents equal to $1. Avoiding float
            $profit += 100 / 10 * $line['line']['ratio'];
        }

        return $profit / 100;
    }
}
