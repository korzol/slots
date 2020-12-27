<?php
declare(strict_types=1);

namespace tests\Slots;

use App\Config\Config;
use App\Slots\Analyzer\Analyzer;
use App\Slots\Finance\Finance;
use App\Slots\Reels\Reels;
use App\Slots\SlotsMachine;
use App\Slots\SlotsMachineBuilder;
use PHPUnit\Framework\TestCase;

class SlotsMachineBuilderTest extends TestCase
{
    public function testCanBuildSlotsMachine(): void
    {
        $config = $this->createMock(Config::class);
        $slotsMachine = $this->createMock(SlotsMachine::class);

        $slotsMachineBuilder = new SlotsMachineBuilder($config, $slotsMachine);
        $slotsMachineBuilder->spinTheReels($this->createMock(Reels::class));
        $slotsMachineBuilder->analyzeTheReels($this->createMock(Analyzer::class));
        $slotsMachineBuilder->analyzeFinance($this->createMock(Finance::class));

        $this->assertInstanceOf(SlotsMachine::class, $slotsMachineBuilder->getSlotsMachine());
    }
}
