<?php

namespace App;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class Logger extends AbstractLogger
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function log($level, string $message, array $context = []): void
    {
        $this->view->exception = $level . ' : ' . $message;
        $this->view->display(__DIR__ . '/Templates/Exceptions.php');
    }
}
