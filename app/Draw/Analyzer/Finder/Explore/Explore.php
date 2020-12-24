<?php
declare(strict_types=1);

namespace App\Draw\Analyzer\Finder\Explore;

use App\Draw\Analyzer\Finder\Explore\Collector\Collector;

class Explore
{
    /**
     * @var array<array<int, array{coords: array{reel: int, tile: int}, value: int}>>
     */
    private array $collection;

    /**
     * Explore constructor.
     * @param array<array<int, array{coords: array{reel: int, tile: int}, value: int}>> $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    private function isFirstElement(int $reel): bool
    {
        return $reel === 0;
    }

    /**
     * @param array<int, array{coords: array{reel: int, tile: int}, value: int}> $line
     * @param int $reel
     * @return bool
     */
    private function isLastElement(array $line, int $reel): bool
    {
        return $reel == (count($line) - 1);
    }

    /**
     * @param array<int, array{coords: array{reel: int, tile: int}, value: int}> $line
     * @param int $reel
     * @return bool
     */
    private function isNeighborElementsEqual(array $line, int $reel): bool
    {
        return $line[$reel]['value'] == $line[$reel - 1]['value'] && $line[$reel]['value'] == $line[$reel + 1]['value'];
    }

    /**
     * @param Collector $collector
     * @param array<int, array{coords: array{reel: int, tile: int}, value: int}> $line
     * @param int $reel
     */
    private function collect(Collector $collector, array $line, int $reel): void
    {
        $collector->addTile($line[$reel - 1]);
        $collector->addTile($line[$reel]);
        $collector->addTile($line[$reel + 1]);
    }

    /**
     * @param array<array<int, array{coords?: array{reel?: int, tile?: int}, value?: int}>> $matchedLines
     * @param array<array{coords: array{reel: int, tile: int}, value: int}> $collection
     * @param int $k
     */
    private function addToMatchedLines(array &$matchedLines, array $collection, int $k): void
    {
        if (count($collection) > 0)
        {
            $matchedLines[$k] = $collection;
        }
    }

    /**
     * @return array{'realized_lines': array<array<int, array{coords?: array{reel?: int, tile?: int}, value?: int}>>}
     */
    public function run(): array
    {
        $matchedLines = [];
        foreach ($this->collection as $k => $line)
        {
            $collector = new Collector();
            foreach ($line as $reel => $tile) {
                if ($this->isFirstElement($reel))
                {
                    continue;
                }
                if ($this->isLastElement($line, $reel))
                {
                    break;
                }

                if ($this->isNeighborElementsEqual($line, $reel))
                {
                    $this->collect($collector, $line, $reel);
                }

            }

            $this->addToMatchedLines($matchedLines, $collector->getCollection(), $k);

            unset($collector);
        }

        return [
            'realized_lines' => $matchedLines
        ];
    }
}
