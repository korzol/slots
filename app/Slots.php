<?php
declare(strict_types=1);

namespace App;

use App\Config\ConfigInterface;
use App\Slots\SlotsMachine;
use App\Slots\SlotsMachineInterface;
use App\Slots\SlotsMachineBuilder;

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
     * @return SlotsMachineInterface
     */
    public function spin(): SlotsMachineInterface
    {
        $slotsMachineBuilder = new SlotsMachineBuilder($this->config, new SlotsMachine());
        $slotsMachineBuilder->pullOut();

        return $slotsMachineBuilder->getSlotsMachine();
    }
}
