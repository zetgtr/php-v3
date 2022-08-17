<?php

namespace App\AbstractFactory;

use App\AbstractFactory\Enum\OrmType;

interface OrmFactoryInterface
{
    public function createORM(OrmType $ormType) : DBConnectionInterface|DBQueryBuilderInterface|DBRecordInterface;
}