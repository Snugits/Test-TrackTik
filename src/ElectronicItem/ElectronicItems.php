<?php

namespace App\ElectronicItem;

class ElectronicItems
{
    private $items = array();

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @param $type
     * @return array
     */
    public function getSortedItems($type): array
    {
        $sorted = array();
        foreach ($this->items as $item) {
            $sorted[($item->price * 100)] = $item;
        }
        ksort($sorted, SORT_NUMERIC);
        return $sorted;
    }

    /**
     * @param string $type
     * @return array
     */
    public function getItemsByType($type)
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