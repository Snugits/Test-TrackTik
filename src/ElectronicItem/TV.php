<?php

namespace App\ElectronicItem;

final class TV implements ElectronicItem
{
    private const MAX_EXTRAS = INF;

    private array $extras;

    public function __construct(private float $price, private int $quantity)
    {
    }

    public function maxExtras(): float
    {
        return self::MAX_EXTRAS;
    }

    public function getType(): Type
    {
        return Type::TELEVISION();
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function addExtra(ElectronicItem $item): void
    {
        $this->extras[] = $item;
    }

    public function getTotalPriceWithExtras(): float
    {
        $sum = $this->price;

        foreach ($this->extras as $extra) {
            $sum += $extra->getTotalPriceWithExtras();
        }

        return $sum;
    }
}
