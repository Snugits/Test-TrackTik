<?php

namespace App\ElectronicItem;

class Console implements ElectronicItem
{
    private const MAX_EXTRAS = 4;
    private const TYPE = 'console';

    public function __construct(private float $price)
    {
    }

    public function maxExtras(): float
    {
        return self::MAX_EXTRAS;
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
