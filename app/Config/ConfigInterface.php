<?php
declare(strict_types=1);

namespace App\Config;

interface ConfigInterface
{
    /**
     * @return array<string, int>
     */
    public function getTiles(): array;

    /**
     * @return array<int>
     */
    public function getReels(): array;

    /**
     * @return array<int>
     */
    public function getLines(): array;

    /**
     * @return array<int>
     */
    public function getPays(): array;
}
