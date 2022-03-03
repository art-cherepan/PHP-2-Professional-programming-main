<?php

namespace tests;

class TestSQL
{
    protected $Db;

    public function __construct()
    {
        $this->Db = new \App\Db();
    }

    public function testExecute($sql, $params = [])
    {
        return assert(true === $this->Db->execute($sql, $params));
    }
}