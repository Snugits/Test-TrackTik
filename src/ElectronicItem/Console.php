<?php

namespace App\ElectronicItem;

final class Console implements ElectronicItem
{
    private const MAX_EXTRAS = 4;

    /**
     * @var ElectronicItem[]
     */
    private $extras = [];

    public function __construct(private float $price, private int $quantity)
    {
    }

    public function maxExtras(): float
    {
        return self::MAX_EXTRAS;
    }

    public function getType(): Type
    {
        return Type::CONSOLE();
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function addExtra(ElectronicItem $item): void
    {
        if (count($this->extras) >= self::MAX_EXTRAS) {
            throw ElectronicItemException::limitExtras(self::MAX_EXTRAS, count($this->extras));
        }

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
