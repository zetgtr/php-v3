<?php

namespace App\AbstractFactory\Mysql;

use App\AbstractFactory\DBConnectionInterface;
use App\AbstractFactory\DBQueryBuilderInterface;
use App\AbstractFactory\DBRecordInterface;
use App\AbstractFactory\Enum\OrmType;

use JetBrains\PhpStorm\Pure;

class MysqlFactory implements MysqlFactoryInterface
{
    #[Pure]
    public function createOrm(OrmType $ormType) : DBConnectionInterface|DBQueryBuilderInterface|DBRecordInterface
    {
        return match ($ormType)
        {
            OrmType::CONNECTION->value => new DbConnection(),
            OrmType::QUERYBILDER->value => new DBQueryBuilder(),
            OrmType::RECORD->value => new DBRecord(),
            default => null
        };
    }
}