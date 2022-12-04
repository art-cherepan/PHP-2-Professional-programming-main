<?php

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function dispatch(string $name)
    {
        if ($this->access()) {
            $this->action($name);
        } else {
            http_response_code(403);
            exit();
        }
    }

    public function action(string $name)
    {
        $method = 'action' . $name;
        if ($this->access()) {
            $this->$method();
        } else {
            http_response_code(403);
            exit();
        }
    }

    protected function access()
    {
        return true;
    }
}
