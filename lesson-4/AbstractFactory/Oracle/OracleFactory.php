<?php

namespace App\AbstractFactory\Oracle;

use App\AbstractFactory\DBConnectionInterface;
use App\AbstractFactory\DBQueryBuilderInterface;
use App\AbstractFactory\DBRecordInterface;
use App\AbstractFactory\Enum\OrmType;
use JetBrains\PhpStorm\Pure;

class OracleFactory implements OracleFactoryInterface
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