<?php
declare(strict_types=1);

namespace App\Draw\Analyzer\Finder\Explore\Collector;


class Collector
{
    /**
     * @var array<int, array{coords: array{reel: int, tile: int}, value: int}>
     */
    private array $collection;

    /**
     * Collector constructor.
     */
    public function __construct()
    {
        $this->collection = [];
    }

    /**
     * @return bool
     */
    private function isCollectionEmpty(): bool
    {
        return count($this->collection) === 0;
    }

    /**
     * @param array{coords: array{reel: int, tile: int}, value: int} $tile
     */
    private function addFirstTile(array $tile): void
    {
        $this->collection = [$tile];
    }

    /**
     * @param array{
     *     coords: array{
     *         reel: int,
     *         tile: int
     *     },
     *     value: int
     * } $tile
     * @return bool
     */
    private function isTileAlreadyInCollection(array $tile): bool
    {
        foreach ($this->collection as $item) {
            if (
                $item['coords']['reel'] == $tile['coords']['reel'] &&
                $item['coords']['tile'] == $tile['coords']['tile']
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array{
     *         coords: array{
     *             reel: int,
     *             tile: int
     *         },
     *         value: int
     *     } $tile
     */
    public function addTile(array $tile): void
    {
        if($this->isCollectionEmpty())
        {
            $this->addFirstTile($tile);
        }

        if ($this->isTileAlreadyInCollection($tile))
        {
            return;
        }

        $this->collection = array_merge(
            $this->collection,
            [$tile]
        );
    }

    /**
     * @return array<array{coords: array{reel: int, tile: int}, value: int}>
     */
    public function getCollection(): array
    {
        return $this->collection;
    }
}
