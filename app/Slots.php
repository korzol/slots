<?php
declare(strict_types=1);

namespace App;

use App\Config\Config;
use App\Config\ConfigInterface;
use App\Draw\Draw;
use App\Draw\Reels\Reels;

class Slots
{
    /**
     * @var ConfigInterface
     */
    private ConfigInterface $config;

    /**
     * Slots constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return array<mixed>
     */
    public function spin(): array
    {
        $reels = new Draw($this->config);
        $reels->pullOut();
        print_r($this->config->getTiles());
        return $this->config->getTiles();
    }
}
