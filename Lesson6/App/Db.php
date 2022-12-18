<?php

namespace App;

use App\Exceptions\DB\DbConnectException;
use App\Exceptions\DB\PDOExecuteException;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $instance = Config::getInstance();
        $config = $instance->data;

        $dsn = $config['db'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];

        try {
            $this->dbh = new \PDO($dsn, $config['user'], $config['password']);

        } catch (\PDOException $e) {
            throw new DbConnectException('Ошибка при подключении к БД');
        }
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (\PDOException $e) {
            throw new PDOExecuteException('Ошибка при подготовке SQL-запроса');
        }

        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
        } catch (\PDOException $e) {
            throw new PDOExecuteException('Ошибка при подготовке SQL-запроса');
        }

        return $sth->execute($params);
    }

    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}
