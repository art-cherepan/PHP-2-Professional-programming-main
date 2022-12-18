<?php

use \App\Exceptions\DB\DbConnectException;
use \App\Exceptions\UrlParamMissingException;
use \App\Exceptions\NotFoundException;

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
$urlParts = explode('/', $url);

$controller = $urlParts[3] ?: 'Index';
$action = $urlParts[4] ?: 'Default';

$class = '\\App\\Controllers\\' . $controller;

$ctrl = new $class;
$view = new \App\View();

$logger = new \App\Logger();

try {
    $ctrl->dispatch($action);
} catch (DbConnectException $e) {
    $logger->alert($e->getMessage());
} catch (UrlParamMissingException | NotFoundException $e) {
    $logger->critical($e->getMessage());
}
