<?php
declare(strict_types=1);

namespace App\Slots;

interface SlotsBuilderInterface
{
    public function pullOut(): void;
}
