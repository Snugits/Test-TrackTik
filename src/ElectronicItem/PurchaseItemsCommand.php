<?php

namespace App\ElectronicItem;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class PurchaseItemsCommand extends Command
{
    protected static $defaultName = 'app:electronicItem:purchase';

    protected function configure()
    {
        $this->setDescription('Purchase Electronic Items and show their total price')
            ->setHelp('This script put in the cart set of default Electronic Items and output their total price')
            ->setAliases(['purchase']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $io = new SymfonyStyle($input, $output);
        $io->title('Buying Electronic Items regarding task.');
        $io->listing([
            '1 console',
            '2 televisions with different prices',
            '1 microwave'
        ]);

        $io->info('Creating a console with price 199.99');
        $console = Factory::create(Type::CONSOLE(), 199.99, 1);

        $io->info('Creating a TV with price 59.99');
        $tv1 = Factory::create(Type::TELEVISION(), 59.99, 1);

        $io->info('Creating a TV with price 119.99');
        $tv2 = Factory::create(Type::TELEVISION(), 119.99, 1);

        $io->info('Creating a microwave with price 53.59');
        $microwave = Factory::create(Type::MICROWAVE(), 53.59, 1);

        $io->info('Adding to console 2 remote controllers for 19.99 each');
        $consoleRemote1 = Factory::create(Type::CONTROLLER(), 19.99, 1);
        $console->addExtra($consoleRemote1);
        $consoleRemote2 = Factory::create(Type::CONTROLLER(), 19.99, 1);
        $console->addExtra($consoleRemote2);

        $io->info('Adding to TV#1 2 remote controllers for 15.99 each');
        $tv1Remote1 = Factory::create(Type::CONTROLLER(), 15.99, 1);
        $tv1->addExtra($tv1Remote1);
        $tv1Remote2 = Factory::create(Type::CONTROLLER(), 15.99, 1);
        $tv1->addExtra($tv1Remote2);

        $io->info('Adding to TV#2 1 remote controllers for 29.99 each');
        $tv2Remote = Factory::create(Type::CONTROLLER(), 29.99, 1);
        $tv2->addExtra($tv2Remote);

        $io->info('Put all items in a cart');
        $cart = new ElectronicItems([$console, $tv1, $tv2, $microwave]);

        $sortedItemsByPrice = $cart->getSortedItemsByPrice();
        $sortedItemsView = [];
        foreach ($sortedItemsByPrice as $sortedItem) {
            $sortedItemsView[] = [$sortedItem->getPrice(), $sortedItem->getType()];
        }

        $io->section('Items Sorted by own price');
        $io->table(['Price', 'Item Type'], $sortedItemsView);

        $sortedItemsByTotalPrice = $cart->getSortedItemsByTotalPrice();
        $sortedItemsView = [];
        foreach ($sortedItemsByTotalPrice as $sortedItem) {
            $sortedItemsView[] = [$sortedItem->getTotalPriceWithExtras(), $sortedItem->getType()];
        }

        $io->section('Items Sorted by total price with extras');
        $io->table(['Price', 'Item Type'], $sortedItemsView);

        $io->success(sprintf("The total sum: %01.2f", $cart->getTotalSum()));
        return self::SUCCESS;
    }
}