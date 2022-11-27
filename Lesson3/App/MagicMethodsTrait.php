<?php

namespace App;

trait MagicMethodsTrait
{
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function __isset($key)
    {
        var_dump($key); die;
        return isset($this->data[$key]);
    }
}
