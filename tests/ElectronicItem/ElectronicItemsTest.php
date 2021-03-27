<?php

namespace App\Tests\ElectronicItem;

use App\ElectronicItem\Controller;
use App\ElectronicItem\ElectronicItems;
use App\ElectronicItem\Microwave;
use App\ElectronicItem\TV;
use App\ElectronicItem\Type;
use PHPUnit\Framework\TestCase;

class ElectronicItemsTest extends TestCase
{
    public function testGetSortedItemsByPrice(): void
    {
        // given
        $tv = new TV(10, 1);
        $microwave = new Microwave(15, 2);
        $electronicItems = new ElectronicItems([$microwave, $tv]);

        // when
        $result = $electronicItems->getSortedItemsByPrice();

        // then
        self::assertEquals([$tv, $microwave], $result);
    }

    public function testGetSortedItemsByTotalPrice()
    {
        // given
        $controller = new Controller(20, 1);
        $tv = new TV(10, 1);
        $tv->addExtra($controller);

        $microwave = new Microwave(15, 2);
        $electronicItems = new ElectronicItems([$microwave, $tv]);

        // when
        $result = $electronicItems->getSortedItemsByTotalPrice();

        // then
        self::assertEquals([$microwave, $tv], $result);
    }

    public function testGetItemsByType()
    {
        // given
        $controller = new Controller(20, 1);
        $tv = new TV(10, 1);
        $tv->addExtra($controller);

        $microwave = new Microwave(15, 2);
        $electronicItems = new ElectronicItems([$microwave, $tv]);

        // when
        $result = $electronicItems->getItemsByType(Type::TELEVISION());

        // then
        self::assertEquals([$tv], $result);
    }

    public function testGetTotalPrice()
    {
        // given
        $controller = new Controller(20, 1);
        $tv = new TV(10, 1);
        $tv->addExtra($controller);

        $microwave = new Microwave(15, 2);
        $electronicItems = new ElectronicItems([$microwave, $tv]);

        // when
        $result = $electronicItems->getTotalPrice();

        // then
        self::assertEquals(45, $result);
    }
}