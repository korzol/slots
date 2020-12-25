<?php
declare(strict_types=1);

namespace App\Slots\Analyzer;

interface AnalyzerInterface
{
    /**
     * @return array{
     *     updatedReelsBuffer: array<int, array<int>>,
     *     matchedLines: array{'realized_lines': array<int, array{coords?: array{reel?: int, tile?: int}, value?: int}>}
     * }
     */
    public function analyze(): array;
}
