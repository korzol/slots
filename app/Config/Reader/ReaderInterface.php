<?php
declare(strict_types=1);

namespace App\Config\Reader;

interface ReaderInterface
{
    /**
     * @return string
     */
    public function read(): string;
}
