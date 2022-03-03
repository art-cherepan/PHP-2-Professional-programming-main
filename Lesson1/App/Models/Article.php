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

    public static function getThreeLastNews()
    {
        $Db = new Db();
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3';
        return $Db->query($sql, [], static::class);
    }

}