<?php

namespace App\Models;

use App\Model;

class Author
    extends Model
{
    protected static $table = 'authors';

    public $first_name;
    public $second_name;

    public function validation(array $data)
    {

    }
}
