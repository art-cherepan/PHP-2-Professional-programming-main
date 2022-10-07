<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\Article::findThreeLatestNews();

include __DIR__ . '/App/Templates/index.php';
