<?php
declare(strict_types=1);

namespace App\Draw\Analyzer;

use App\Draw\Analyzer\Collector\Collector;
use App\Draw\Analyzer\Finder\Finder;
use App\Draw\Analyzer\Preparer\Preparer;

class Analyzer
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

    public function analyze(): array
    {
        $reelsBuffer = Preparer::replaceMysteryTile(
            $this->reelsBuffer['reelsBuffer'],
            $this->reelsBuffer['mysterySymbols']['mysteryTile'],
            $this->reelsBuffer['mysterySymbols']['toTile']
        );

        //print_r($reelsBuffer); exit();

        $collection = Collector::collect($this->lines, $reelsBuffer);
        echo "Collection ===".PHP_EOL;

        $finder = new Finder($collection);
        $finder->find();

//print_r($collection); exit();

        return $reelsBuffer;
    }

    public function replaceMysteryTile(): array
    {
        return [];
    }

    public function goThroughLines()
    {
        // collect tiles from reelsBuffer according to predefined lines
        return[];
    }

    public function findSequences(): array
    {
        // @param is output from goThroughLines
        // find out if there is any sequence from 3 or more tiles
    }
}
