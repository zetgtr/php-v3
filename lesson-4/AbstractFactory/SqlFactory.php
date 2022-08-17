<?php

namespace App\AbstractFactory;

use App\AbstractFactory\Enum\OrmType;
use App\AbstractFactory\Enum\SqlType;
use App\AbstractFactory\Mysql\MysqlFactoryInterface;
use App\AbstractFactory\Oracle\OracleFactoryInterface;
use App\AbstractFactory\Postgres\PostgresFactoryInterface;

class SqlFactory implements SqlFactoryInterface
{
    public function __construct(
        private MysqlFactoryInterface $mysqlFactory,
        private OracleFactoryInterface $oracleFactory,
        private PostgresFactoryInterface $postgresFactory,
    ){}

    public function create(SqlType $sqlType, OrmType $ormType) : DBConnectionInterface|DBQueryBuilderInterface|DBRecordInterface
    {
        return match ($sqlType)
        {
            SqlType::MYSQL->value => $this->mysqlFactory->createORM($ormType),
            SqlType::ORACLE->value => $this->oracleFactory->createOrm($ormType),
            SqlType::POSTGRES->value => $this->postgresFactory->createOrm($ormType),
            default => null
        };
    }
}