<?php

namespace App\Models;

use App\Db;
use App\Exceptions\ErrorsExceptions;
use App\Model;

class Article
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $lead;
    public $author_id;

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

    public function __get($field)
    {
        if ('author' ==  $field && isset($this->author_id)) {
            return Author::findById($this->author_id);
        } else {
            return null;
        }
    }

    public function validation(array $data)
    {
        $errors = new ErrorsExceptions();

        if (isset($data['title']) && strlen($data['title']) < 10) {
           $errors->add(new \Exception('Слишком короткий Заголовок'));
        }

        if (isset($data['lead']) && strlen($data['lead']) < 100) {
            $errors->add(new \Exception('Слишком короткая статья'));
        }

        return $errors;
    }
}
