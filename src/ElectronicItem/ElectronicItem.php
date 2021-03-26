<?php

namespace App\ElectronicItem;

interface ElectronicItem
{
    public function maxExtras(): float;

    public function getType(): Type;

    public function getPrice(): float;

    /**
     * @param ElectronicItem $item
     * @throws ElectronicItemException
     */
    public function addExtra(ElectronicItem $item): void;

    public function getTotalPriceWithExtras(): float;
}
