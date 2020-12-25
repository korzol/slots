<?php
declare(strict_types=1);

namespace App\Slots\Analyzer;

use App\Slots\Analyzer\Collector\Collector;
use App\Slots\Analyzer\Finder\Finder;
use App\Slots\Analyzer\Preparer\Preparer;

class Analyzer implements AnalyzerInterface
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
     * @var array<array<int>>
     */
    private array $lines;

    /**
     * Analyzer constructor.
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
     * @param array<array<int>> $lines
     */
    public function __construct(array $reelsBuffer, array $lines)
    {
        $this->reelsBuffer = $reelsBuffer;
        $this->lines = $lines;
    }

    /**
     * @inheritDoc
     */
    public function analyze(): array
    {
        $reelsBuffer = Preparer::replaceMysteryTile(
            $this->reelsBuffer['reelsBuffer'],
            $this->reelsBuffer['mysterySymbols']['mysteryTile'],
            $this->reelsBuffer['mysterySymbols']['toTile']
        );

        $collection = Collector::collect($this->lines, $reelsBuffer);

        $finder = new Finder($collection);
        $matchedLines = $finder->find();

        return [
            'updatedReelsBuffer' => $reelsBuffer,
            'matchedLines' => $matchedLines,
        ];
    }
}
