<?php
declare(strict_types=1);

namespace App\Draw;

use App\Config\ConfigInterface;
use App\Draw\Reels\Reels;

class Draw implements DrawInterface
{
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
        $this->config = $config;
    }

    /**
     * @return array{
     *     mysterySymbols: array{
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
    private function spinTheReels(): array
    {
        $reels = new Reels($this->config->getTiles(), $this->config->getReels());

        return $reels->spin();
    }

    /**
     * @return array
     */
    private function analyzeTheReels()
    {
        return [];
    }

    /**
     * @return array
     */
    public function pullOut(): array
    {
        print_r($this->spinTheReels()); exit();

        return array_merge(
            $this->spinTheReels(),
            $this->analyzeTheReels()
        );
    }
}
