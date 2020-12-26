<?php
declare(strict_types=1);

namespace App\Slots\Finance;


interface FinanceInterface
{
    /**
     * @return array{
     *     analysis: array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>,
     *     profit: int
     * }
     */
    public function conclusion(): array;
}
