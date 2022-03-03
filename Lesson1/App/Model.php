<?php


namespace App;


abstract class Model
{

    protected static $table = null;

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table; //LSB
        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $data = $db->query($sql, [':id' => $id], static::class);

        if (!empty($data)) {
            return $data[0];
        } else {
            return false;
        }
    }

}