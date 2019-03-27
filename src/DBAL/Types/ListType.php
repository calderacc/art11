<?php declare(strict_types=1);

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class ListType extends AbstractEnumType
{
    public const BLACK_LIST = 'BL';
    public const WHITE_LIST = 'WL';

    protected static $choices = [
        self::BLACK_LIST => 'Black List',
        self::WHITE_LIST => 'White List',
    ];
}