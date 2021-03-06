<?php
declare(strict_types=1);

namespace App\Slots;

use App\Config\ConfigInterface;
use App\Slots\Analyzer\AnalyzerInterface;
use App\Slots\Finance\Finance;
use App\Slots\Finance\FinanceInterface;
use App\Slots\Reels\Reels;
use App\Slots\Analyzer\Analyzer;
use App\Slots\Reels\ReelsInterface;

class SlotsMachineBuilder implements SlotsMachineBuilderInterface
{
    /**
     * @var SlotsMachineInterface
     */
    private SlotsMachineInterface $slotsMachine;

    /**
     * @var ConfigInterface
     */
    private ConfigInterface $config;

    /**
     * SlotsMachineBuilder constructor.
     * @param ConfigInterface $config
     * @param SlotsMachineInterface $slotsMachine
     */
    public function __construct(ConfigInterface $config, SlotsMachineInterface $slotsMachine)
    {
        $this->slotsMachine = $slotsMachine;
        $this->config = $config;
    }

    /**
     * @param ReelsInterface $reels
     */
    public function spinTheReels(ReelsInterface $reels): void
    {
        $this->slotsMachine->setReelsBuffer($reels->spin());
    }

    /**
     * @param AnalyzerInterface $analyzer
     */
    public function analyzeTheReels(AnalyzerInterface $analyzer): void
    {
        $this->slotsMachine->setAnalyzeReport($analyzer->analyze());
    }

    public function analyzeFinance(FinanceInterface $finance): void
    {
        $this->slotsMachine->setFinanceReport($finance->conclusion());
    }

    public function build(): void
    {
        $reels = new Reels($this->config->getTiles(), $this->config->getReels());
        $this->spinTheReels($reels);

        $analyzer = new Analyzer($this->slotsMachine->getReelsBuffer(), $this->config->getLines());
        $this->analyzeTheReels($analyzer);

        $finance = new Finance($this->config->getPays(), $this->slotsMachine->getAnalyzeReport());
        $this->analyzeFinance($finance);
    }

    /**
     * @return SlotsMachineInterface
     */
    public function getSlotsMachine(): SlotsMachineInterface
    {
        return $this->slotsMachine;
    }
}
