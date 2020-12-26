<?php
declare(strict_types=1);

namespace App\Slots;

interface SlotsMachineInterface
{
    /**
     * @param array{
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
     * } $reelsBuffer
     */
    public function setReelsBuffer(array $reelsBuffer): void;

    /**
     * @param array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>}
     * } $analyzeReport
     */
    public function setAnalyzeReport(array $analyzeReport): void;

    /**
     * @param array{
     *     analysis: array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>,
     *     profit: int
     * } $financeReport
     */
    public function setFinanceReport(array $financeReport): void;

    /**
     * @return array{
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
    public function getReelsBuffer(): array;

    /**
     * @return array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>}
     * }
     */
    public function getAnalyzeReport(): array;

    /**
     * @return array{
     *     analysis: array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>,
     *     profit: int
     * } $financeReport
     */
    public function getFinanceReport(): array;

    /**
     * @return array{
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
     *     reelsBuffer: array<int, array<int>>,
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array<int, array{coords?: array{reel?: int, tile?: int}, value: int}>>},
     *     analysis: array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>,
     *     profit: int
     * }
     */
    public function getReport(): array;

    /**
     * @return string
     */
    public function getJsonReport(): string;
}
