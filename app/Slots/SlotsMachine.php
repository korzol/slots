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
     *     matchedLines: array{'realized_lines': array<int, array{coords?: array{reel?: int, tile?: int}, value?: int}>}
     * }
     */
    private array $analyzeReport;

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
    public function getReport(): array
    {
        return $this->reelsBuffer + $this->analyzeReport;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getJsonReport(): string
    {
         $report = json_encode($this->reelsBuffer + $this->analyzeReport);
         if ($report)
         {
             return $report;
         }

         throw new Exception("Can not generate JSON report");
    }
}
