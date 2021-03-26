<?php

namespace App\ElectronicItem;

final class ElectronicItemException extends \Exception
{

    public static function limitExtras(int $max, int $current)
    {
        return new self("Reached the limit for extras. Capacity: $max, Current: $current");
    }
}