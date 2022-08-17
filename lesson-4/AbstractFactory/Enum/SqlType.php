<?php

namespace App\AbstractFactory\Enum;

enum SqlType: string
{
    case MYSQL = "mysql";
    case ORACLE = "oracle";
    case POSTGRES = "postgres";

    public static function getProductByValue(string $type) : SqlType
    {
        return match ($type)
        {
            self::MYSQL->value => self::MYSQL,
            self::ORACLE->value => self::ORACLE,
            self::POSTGRES->value => self::POSTGRES,
        };
    }
}