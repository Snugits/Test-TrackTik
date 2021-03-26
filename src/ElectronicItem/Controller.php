<?php

namespace App\ElectronicItem;

class Controller implements ElectronicItem
{
    private const MAX_EXTRAS = 0;
    private const TYPE = 'controller';

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
