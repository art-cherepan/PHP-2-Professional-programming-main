<?php

namespace App;

use App\Exceptions\DB\PDOExecuteException;

trait PdoPrepareTrait
{
    protected function prepare(\PDO $dbh, string $sql): \PDOStatement
    {
        try {
            $sth = $dbh->prepare($sql);
        } catch (\Throwable $e) {
            var_dump($e); die;
            throw new PDOExecuteException('Ошибка при подготовке SQL-запроса');
        }

        return $sth;
    }
}
