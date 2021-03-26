<?php

namespace App\ElectronicItem;

class TV implements ElectronicItem
{
    private const MAX_EXTRAS = INF;
    private const TYPE = 'television';

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
