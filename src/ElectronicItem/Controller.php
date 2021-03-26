<?php

namespace App\ElectronicItem;

final class Controller implements ElectronicItem
{
    private const MAX_EXTRAS = 0;

    public function __construct(private float $price, private int $quantity)
    {
    }

    public function maxExtras(): float
    {
        return self::MAX_EXTRAS;
    }

    public function getType(): Type
    {
        return Type::CONTROLLER();
    }

    public function getPrice(): float
    {
        return $this->price;
    }


    public function addExtra(ElectronicItem $item): void
    {
        throw ElectronicItemException::limitExtras(self::MAX_EXTRAS, 0);
    }

    public function getTotalPriceWithExtras(): float
    {
        return $this->price;
    }
}
