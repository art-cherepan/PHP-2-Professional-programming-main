<?php

namespace App;

class Config
{
    protected static $config = null;

    public $data;

    public static function getInstance(): self
    {
        if (self::$config === null) {
            self::$config = new self();
        }

        return self::$config;
    }

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}
