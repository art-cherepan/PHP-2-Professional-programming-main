<?php

use \App\Exceptions\DB\PDOPrepareException;
use \App\Exceptions\DB\DbConnectException;
use \App\Exceptions\UrlParamMissingException;
use \App\Exceptions\NotFoundException;

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
//var_dump($url); die;
$urlParts = explode('/', $url);
//var_dump($urlParts); die;

$controller = $urlParts[3] ?: 'Index';
$action = $urlParts[4] ?: 'Default';

$class = '\\App\\Controllers\\' . $controller;

//echo $action; die;

$ctrl = new $class;
$view = new \App\View();

try {
    $ctrl->dispatch($action);
} catch (PDOPrepareException | DbConnectException | UrlParamMissingException | NotFoundException $e) {
    $view->exception = $e;
    $view->display(__DIR__ . '/App/Templates/Exceptions.php');
}
