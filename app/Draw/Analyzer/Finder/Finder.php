<?php
declare(strict_types=1);

namespace App\Draw\Analyzer\Finder;


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
     * @return array{'realized_lines': array<array<int, array{'coords': array{'reel': int, 'tile': int}, 'value': int}>>}
     */
    public function find(): array
    {
        $matchedLines = [[]];
        foreach ($this->collection as $k => $line)
        {
            $match = [];
            foreach ($line as $reel => $tile)
            {
                if ($reel == 0)
                {
                    continue;
                }

                if ($reel == (count($line) - 1) )
                {
                    break;
                }

                // compare current tile with previous and next one
                if ($line[$reel]['value'] == $line[$reel - 1]['value'] && $line[$reel]['value'] == $line[$reel + 1]['value'])
                {
                    $match = $this->addMatch($match, $line[$reel - 1]);
                    $match = $this->addMatch($match, $line[$reel]);
                    $match = $this->addMatch($match, $line[$reel + 1]);
                }
            }
            if (count($match) > 0)
            {
                $matchedLines[$k] = $match;
            }
            unset($match);
        }

        return [
            'realized_lines' => $matchedLines
        ];
    }

    /**
     * @param array<int, array{coords: array{reel: int, tile: int}, value: int}> $match
     * @param array{coords: array{reel: int, tile: int}, value: int} $tile
     * @return array<int, array{coords: array{reel: int, tile: int}, value: int}>
     */
    public function addMatch(array $match, array $tile): array
    {
        if (count($match) === 0)
        {
            $match = [$tile];
            return $match;
        }

        // check if value already is in array
        foreach ($match as $line)
        {
            if (
                $line['coords']['reel'] == $tile['coords']['reel'] &&
                $line['coords']['tile'] == $tile['coords']['tile']
            ) {
                return $match;
            }
        }

        // add new value in array
        $match = array_merge($match, [$tile]);

        return $match;
    }
    
}
