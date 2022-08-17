<?php

namespace App\AbstractFactory\Enum;

enum OrmType : string
{
    case CONNECTION = "connection";
    case QUERYBILDER = "query_builder";
    case RECORD = "record";

    public static function getProductByValue(string $type) : OrmType
    {
        return match ($type)
        {
            self::CONNECTION->value => self::CONNECTION,
            self::QUERYBILDER->value => self::QUERYBILDER,
            self::RECORD->value => self::RECORD,
        };
    }
}