<?php

namespace App\ElectronicItem;

final class ElectronicItems
{
    /**
     * @param ElectronicItem[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return ElectronicItem[]
     */
    public function getSortedItemsByPrice(): array
    {
        $toSort = $this->items;

        usort(
            $toSort,
            static fn(ElectronicItem $item1, ElectronicItem $item2) => $item1->getPrice() <=> $item2->getPrice()
        );
        return $toSort;
    }

    /**
     * @return ElectronicItem[]
     */
    public function getSortedItemsByTotalPrice(): array
    {
        $toSort = $this->items;

        usort(
            $toSort,
            static fn(ElectronicItem $item1, ElectronicItem $item2) => $item1->getTotalPriceWithExtras() <=> $item2->getTotalPriceWithExtras()
        );
        return $toSort;
    }

    /**
     * @param Type $type
     * @return ElectronicItem[]
     */
    public function getItemsByType(Type $type): array
    {
        return array_filter($this->items, static fn(ElectronicItem $item) => $item->getType()->equals($type));
    }

    public function getTotalSum(): float
    {
        $sum = 0;

        foreach ($this->items as $item) {
            $sum += $item->getTotalPriceWithExtras();
        }

        return $sum;
    }
}