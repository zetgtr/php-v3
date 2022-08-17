<?php

namespace App\AbstractFactory;

use App\AbstractFactory\Enum\OrmType;
use App\AbstractFactory\Enum\SqlType;

interface SqlFactoryInterface
{
    public function create(SqlType $sqlType,OrmType $ormType): DBConnectionInterface|DBQueryBuilderInterface|DBRecordInterface;
}