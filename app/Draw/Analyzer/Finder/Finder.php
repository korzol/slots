<?php
declare(strict_types=1);

namespace App\Draw\Analyzer\Finder;


use App\Draw\Analyzer\Finder\Explore\Explore;

class Finder
{
    /**
     * @var array<array<int, array{coords: array{reel: int, tile: int}, value: int}>>
     */
    private array $collection;

    /**
     * Finder constructor.
     * @param array<array<int, array{coords: array{reel: int, tile: int}, value: int}>> $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return array{'realized_lines': array<array<int, array{coords?: array{reel?: int, tile?: int}, value?: int}>>}
     */
    public function find(): array
    {
        $explore = new Explore($this->collection);

        return $explore->run();
    }
}
