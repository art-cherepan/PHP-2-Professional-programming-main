<?php

include __DIR__ . '/autoload.php';

if (!empty($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);

    if(empty($article)) {
        http_response_code(404);
        exit();
    }

    $view = new \App\View();
    $view->article = $article;
    $view->display(__DIR__ . '/App/Templates/article.php');

} else {
    http_response_code(404);
}
