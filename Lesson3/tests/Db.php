<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

$insert = 'INSERT INTO news (`title`, `lead`) VALUES (:title, :lead)';
assert(true === $db->execute($insert, [':title' => 'Заголовок', ':lead' => 'Статья']));

$update = 'UPDATE news SET `lead` = :lead WHERE `title` = :title';
assert(true === $db->execute($update, [':title' => 'Заголовок', ':lead' => 'Новая статья']));
