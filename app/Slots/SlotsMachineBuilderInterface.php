<?php
declare(strict_types=1);

namespace App\Slots;

interface SlotsMachineBuilderInterface
{
    public function pullOut(): void;
}
