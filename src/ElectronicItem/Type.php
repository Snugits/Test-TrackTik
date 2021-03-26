<?php

namespace App\ElectronicItem;

use MyCLabs\Enum\Enum;

/**
 * @method static CONSOLE
 * @method static CONTROLLER
 * @method static MICROWAVE
 * @method static TELEVISION
 */
final class Type extends Enum
{
    private const CONSOLE = 'console';
    private const CONTROLLER = 'controller';
    private const MICROWAVE = 'microwave';
    private const TELEVISION = 'television';
}