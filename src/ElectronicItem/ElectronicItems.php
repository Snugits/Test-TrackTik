<?php

namespace App\ElectronicItem;

class ElectronicItems
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
    public function getSortedItems(): array
    {
        $toSort = $this->items;

        usort(
            $toSort,
            static fn(ElectronicItem $item1, ElectronicItem $item2) => $item1->getPrice() <=> $item2->getType()
        );
        return $toSort;
    }

    /**
     * @param string $type
     * @return ElectronicItem[]
     */
    public function getItemsByType(string $type): array
    {
        return array_filter($this->items, static fn(ElectronicItem $item) => $item->getType() === $type);
    }
}