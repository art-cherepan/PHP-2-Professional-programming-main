<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$urlParts = explode('/', $url);

$controller = $urlParts[3] ?: 'Index';
$action = $urlParts[4] ?: 'Default';

$class = '\\App\\Controllers\\' . $controller;

$ctrl = new $class;
$ctrl->dispatch($action);
