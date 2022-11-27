<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->news = \App\Models\Article::findThreeLatestNews();

$view->display(__DIR__ . '/App/Templates/index.php');
