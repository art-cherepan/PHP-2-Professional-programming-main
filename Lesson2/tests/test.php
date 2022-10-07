<?php

require __DIR__ . '/../autoload.php';

$config = \App\Config::getInstance();

var_dump($config->data['db']);

$article = \App\Models\Article::findById(1);

$article->lead = 'beeee';
$article->update();

$article = new \App\Models\Article();

$article->lead = 'foo';
$article->title = 'bar';

$article->insert();
