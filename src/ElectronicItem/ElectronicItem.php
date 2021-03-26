<?php

namespace App\ElectronicItem;

interface ElectronicItem
{
    public function maxExtras(): float;

    public function getType(): string;

    public function getPrice(): float;
}
