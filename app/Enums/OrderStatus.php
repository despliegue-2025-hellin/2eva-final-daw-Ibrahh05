<?php

namespace App\Enums;

enum OrderStatus:string
{
    case CREATED = 'CREATED';
    case PAID = 'PAID';
    case IN_PREPARATION = 'IN_PREPARATION';
    case DELIVERED = 'DELIVERED';
    case CANCELED = 'CANCELED';

    public static function values():array{
        return array_column(self::cases(), 'value');
    }

}
