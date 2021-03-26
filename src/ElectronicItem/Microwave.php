<?php

namespace App\ElectronicItem;

class Microwave implements ElectronicItem
{
    private const MAX_EXTRAS = 0;
    private const TYPE = 'microwave';

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
