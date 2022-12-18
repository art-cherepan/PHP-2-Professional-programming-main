<?php

namespace App\Exceptions;

class ErrorsExceptions
    extends \Exception
{

    protected $errors = [];

    public function add(\Throwable $ex)
    {
        $this->errors[] = $ex;
    }

    public function getAll()
    {
        return $this->errors;
    }

    public function empty()
    {
        return empty($this->errors);
    }

}
