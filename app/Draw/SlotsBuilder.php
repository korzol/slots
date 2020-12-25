<?php
declare(strict_types=1);

namespace App\Draw;

use App\Config\ConfigInterface;
use App\Draw\Analyzer\AnalyzerInterface;
use App\Draw\Reels\Reels;
use App\Draw\Analyzer\Analyzer;
use App\Draw\Reels\ReelsInterface;


// TODO: to be refactor to SlotsBuilder

class Draw implements DrawInterface
{
    /**
     * @var Report
     */
    private Report $report;

    /**
     * @var ConfigInterface
     */
    private ConfigInterface $config;

    /**
     * Draw constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->report = new Report();
        $this->config = $config;
    }

    /**
     * @param ReelsInterface $reels
     */
    public function spinTheReels(ReelsInterface $reels): void
    {
        $this->report->setReelsBuffer($reels->spin());
    }

    /**
     * @param AnalyzerInterface $analyzer
     */
    public function analyzeTheReels(AnalyzerInterface $analyzer): void
    {
        $this->report->setAnalyzeReport($analyzer->analyze());
    }

    public function pullOut(): void
    {
        $reels = new Reels($this->config->getTiles(), $this->config->getReels());
        $this->spinTheReels($reels);

        $analyzer = new Analyzer($this->report->getReelsBuffer(), $this->config->getLines());
        $this->analyzeTheReels($analyzer);
    }

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
     *     reelsBuffer: array{int: array{int}},
     *     updatedReelsBuffer: array{int, array{int}},
     *     matchedLines: array{'realized_lines': array{int, array{coords?: array{reel?: int, tile?: int}, value?: int}}}
     * }
     */
    public function getReport(): array
    {
        return $this->report->getReport();
    }
}