<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $lead;

    public static function findThreeLatestNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT 3';
        $data =  $db->query($sql, [], static::class);

        if (empty($data)) {
            return false;
        }

        return $data;
    }
}
