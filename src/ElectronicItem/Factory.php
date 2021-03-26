<?php

namespace App\ElectronicItem;

class Factory
{
    public static function create(Type $type, float $price, int $quantity): ElectronicItem
    {
        return match (true) {
            $type->equals(Type::CONSOLE()) => new Console($price, $quantity),
            $type->equals(Type::CONTROLLER()) => new Controller($price, $quantity),
            $type->equals(Type::MICROWAVE()) => new Microwave($price, $quantity),
            $type->equals(Type::TELEVISION()) => new TV($price, $quantity),
        };
    }
}