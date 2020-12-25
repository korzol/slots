<?php
declare(strict_types=1);

namespace App;

use App\Config\ConfigInterface;
use App\Slots\SlotsBuilder;

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
        $reels = new SlotsBuilder($this->config);
        $reels->pullOut();

        return $reels->getReport();
    }
}
