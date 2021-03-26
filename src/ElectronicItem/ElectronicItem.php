<?php

namespace App\ElectronicItem;

class ElectronicItem
{
    private float $price;
    private string $type;
    public string $wired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';

    public static $types = [
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_MICROWAVE
    ];

    function getPrice(): float
    {
        return $this->price;
    }

    function getType(): string
    {
        return $this->type;
    }

    function getWired(): string
    {
        return $this->wired;
    }

    function setPrice(float $price): void
    {
        $this->price = $price;
    }

    function setType(string $type): void
    {
        $this->type = $type;
    }

    function setWired(string $wired): void
    {
        $this->wired = $wired;
    }
}
