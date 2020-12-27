<?php
declare(strict_types=1);

namespace App\Slots\Finance\Analyzer;

class Analyzer
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
     * @return array<int, array{line: array{id: int, tile: int, count: int, ratio: int}}>
     */
    public function analyze(): array
    {
        // TODO: refactor this class

        $lines = [];

        $realizedLines = $this->report['matchedLines']['realized_lines'];

        if (count($realizedLines) > 0)
        {
            foreach ($realizedLines as $lineId => $line) {
                $ratio = 0;

                foreach ($this->pays as $k => $data) {
                    $tile = $line[0]['value'];
                    $matched = count($realizedLines[$lineId]);

                    if ($data[0] == $tile && $data[1] == $matched) {
                        $ratio = $data[2];
                    }
                }

                $lines[] = [
                    'line' => [
                        'id' => $lineId,
                        'tile' => $line[0]['value'],
                        'count' => count($line),
                        'ratio' => $ratio
                    ]
                ];
            }
        }

        return $lines;
    }
}
