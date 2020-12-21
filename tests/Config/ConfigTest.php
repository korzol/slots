<?php
declare(strict_types=1);

namespace tests\Config;

use App\Config\Config;
use \PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testCanCreateClassInstance(): void
    {
        $this->assertInstanceOf(Config::class, Config::create('config.json'));
    }

    public function testGetTiles(): void
    {
        $config = Config::create('config.json');

        $this->assertIsArray($config->getTiles());
    }

    public function testGetReels(): void
    {
        $config = Config::create('config.json');

        $this->assertIsArray($config->getReels());
    }

    public function testGetLines(): void
    {
        $config = Config::create('config.json');

        $this->assertIsArray($config->getLines());
    }

    public function testGetPays(): void
    {
        $config = Config::create('config.json');
        $this->assertIsArray($config->getPays());
    }
}
