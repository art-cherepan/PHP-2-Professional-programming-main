<?php

include __DIR__ . '/autoload.php';

if (empty($_GET['id'])) {
    http_response_code(404);
}

$article = \App\Models\Article::findById($_GET['id']);

if (empty($article)) {
    http_response_code(404);
}

include __DIR__ . '/App/Templates/article.php';
