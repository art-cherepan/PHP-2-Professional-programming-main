<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::getThreeLastNews();
$view = new \App\View();

$view->assign('news', \App\Models\Article::getThreeLastNews());
$view->display(__DIR__ . '/App/templates/index.php');

//var_dump(\App\Models\Article::findById(1));
//$Db = new \App\Db();
//$testSQL = new \tests\TestSQL();
//
//var_dump($testSQL->testExecute('INSERT INTO news (title, lead) VALUES (:title, :lead)', [':title' => 'Заголовок', ':lead' => 'Статья']));
//var_dump($testSQL->testExecute('UPDATE news SET title = :title WHERE id = :id', [':title' => 'Новый заголовок', ':id' => 1]));
