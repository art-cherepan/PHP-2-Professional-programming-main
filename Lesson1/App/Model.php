<?php

namespace App;

abstract class Model
{
    protected static $table = null;
    public $id;

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $data = $db->query($sql, [':id' => $id], static::class);

        return $data ? $data[0] : false;
    }
}
