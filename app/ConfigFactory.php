<?php
declare(strict_types=1);

namespace App;

use App\Config\Config;
use App\Config\ConfigInterface;

class ConfigFactory
{
    /**
     * @param string $configFile
     * @return ConfigInterface
     */
    public static function build(string $configFile): ConfigInterface
    {
        return Config::create($configFile);
    }
}
