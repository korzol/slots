<?php
declare(strict_types=1);

namespace App\Slots;

use Exception;

class SlotsMachine implements SlotsMachineInterface
{
    /**
     * @var array{
     *     mysterySymbols: array{
     *         mysteryTile: int,
     *         toTile: int,
     *         tiles?: array{
     *             reel?: int,
     *             index?: int,
     *             sequence?: array{
     *                 int,
     *                 int,
     *                 int
     *             }
     *         }
     *     },
     *     reelsBuffer: array<int, array<int>>
     * }
     */
    private array $reelsBuffer;

    /**
     * @var array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>}
     * }
     */
    private array $analyzeReport;

    /**
     * @var array{
     *     analysis: array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>,
     *     profit: int
     * }
     */
    private array $financeReport;

    /**
     * @inheritDoc
     */
    public function setReelsBuffer(array $reelsBuffer): void
    {
        $this->reelsBuffer = $reelsBuffer;
    }

    /**
     * @inheritDoc
     */
    public function setAnalyzeReport(array $analyzeReport): void
    {
        $this->analyzeReport = $analyzeReport;
    }

    /**
     * @inheritDoc
     */
    public function setFinanceReport(array $financeReport): void
    {
       $this->financeReport = $financeReport;
    }

    /**
     * @inheritDoc
     */
    public function getReelsBuffer(): array
    {
        return $this->reelsBuffer;
    }

    /**
     * @inheritDoc
     */
    public function getAnalyzeReport(): array
    {
        return $this->analyzeReport;
    }

    /**
     * @inheritDoc
     */
    public function getFinanceReport(): array
    {
        return $this->financeReport;
    }

    /**
     * @inheritDoc
     */
    public function getReport(): array
    {
        return $this->reelsBuffer + $this->analyzeReport + $this->financeReport;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getJsonReport(): string
    {
         $report = json_encode($this->reelsBuffer + $this->analyzeReport + $this->financeReport);
         if ($report)
         {
             return $report;
         }

         throw new Exception("Can not generate JSON report");
    }
}
