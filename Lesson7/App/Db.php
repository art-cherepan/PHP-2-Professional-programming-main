<?php

namespace App;

use App\Exceptions\DB\DbConnectException;
use App\Exceptions\DB\PDOExecuteException;

class Db
{
    use PdoPrepareTrait;

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
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryEach(string $sql, array $params = [], $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        while ($record = $sth->fetch()) {
            yield $record;
        };
    }

    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($params);
    }

    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}
