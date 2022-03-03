<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', 'root');
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        //PDO::FETCH_CLASS: Будет создан и возвращён новый объект указанного класса. Свойствам объекта будут присвоены значения столбцов, имена которых СОВПАДУТ с именами свойств.
    }

    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }
}