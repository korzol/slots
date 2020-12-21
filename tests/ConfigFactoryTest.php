<?php
declare(strict_types=1);

namespace tests;

use App\Config\ConfigInterface;
use App\ConfigFactory;
use PHPUnit\Framework\TestCase;

class ConfigFactoryTest extends TestCase
{
    public function testCanBuildConfig(): void
    {
        $this->assertInstanceOf(ConfigInterface::class, ConfigFactory::build('./config.json'));
    }
}
