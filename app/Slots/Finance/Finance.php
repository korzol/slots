<?php
declare(strict_types=1);

namespace App\Slots\Finance;


use App\Slots\Finance\Analyzer\Analyzer;
use App\Slots\Finance\Calculator\Calculator;

class Finance implements FinanceInterface
{
    /**
     * @var array<int, array<int>>
     */
    private array $pays;

    /**
     * @var array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>}
     * }
     */
    private array $report;

    /**
     * Finance constructor.
     * @param array<int, array<int>> $pays
     * @param array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>}
     * } $report
     */
    public function __construct(array $pays, array $report)
    {
        $this->pays = $pays;
        $this->report = $report;
    }

    /**
     * @inheritDoc
     */
    public function conclusion(): array
    {
        $analyzer = new Analyzer($this->pays, $this->report);
        $analysis = $analyzer->analyze();

        $calculator = new Calculator($analysis);
        $profit = $calculator->calculate();

        return [
            'analysis' => $analysis,
            'profit' => $profit,
        ];
    }
}
