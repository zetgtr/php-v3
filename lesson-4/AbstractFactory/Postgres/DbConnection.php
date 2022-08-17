<?php

namespace App\AbstractFactory\Postgres;

use App\AbstractFactory\DBConnectionInterface;

class DbConnection implements DBConnectionInterface
{
    public function connect(){}
}