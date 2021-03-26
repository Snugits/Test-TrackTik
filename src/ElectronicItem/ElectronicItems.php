<?php

namespace App\ElectronicItem;

class ElectronicItems
{
    public function __construct(private array $items)
    {
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @param $type
     * @return array
     */
    public function getSortedItems($type): array
    {
        $sorted = [];
        foreach ($this->items as $item) {
            $sorted[($item->price * 100)] = $item;
        }
        ksort($sorted, SORT_NUMERIC);
        return $sorted;
    }

    public function getItemsByType($type): array
    {
        if (in_array($type, ElectronicItem::$types)) {
            $callback = function ($item) use ($type) {
                return $item->type == $type;
            };
            return array_filter($this->items, $callback);
        }

        return [];
    }
}