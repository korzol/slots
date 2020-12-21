<?php
declare(strict_types=1);

namespace App\Config\Reader;

interface ReaderInterface
{
    /**
     * @return array<mixed>
     */
    public function read(): string;
}
