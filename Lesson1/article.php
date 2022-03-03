<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    $view->assign('article', $article);
    $view->display( __DIR__ . '/App/templates/article.php');
}