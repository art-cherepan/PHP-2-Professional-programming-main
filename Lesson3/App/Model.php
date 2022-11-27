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

    public function update()
    {
        $fields = get_object_vars($this);
        $sets = [];
        $data = [];

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;

            if ('id' === $name) {
                continue;
            }

            $sets[] = '`' . $name . '`=:' . $name;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $sets) . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, $data);
    }

    public function insert()
    {
        $fields = get_object_vars($this);
        $sets = [];
        $key = [];
        $data = [];

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            $sets[] = '`' . $name . '`';
            $key[] = ':' . $name;
        }

        $sql = '
        INSERT INTO ' . static::$table . ' (' . implode(', ', $sets) . '
        ) VALUES (' . implode(', ', $key) . ')';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastId();
    }

    public function save()
    {
        if (null == $this->id) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';

        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }
}
