<?php
declare(strict_types=1);

namespace App\Config;

interface ConfigInterface
{
    /**
     * @return array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * }
     */
    public function getTiles(): array;

    /**
     * @return array<int, array<int>>
     */
    public function getReels(): array;

    /**
     * @return array<array<int>>
     */
    public function getLines(): array;

    /**
     * @return array<int, array<int>>
     */
    public function getPays(): array;
}
