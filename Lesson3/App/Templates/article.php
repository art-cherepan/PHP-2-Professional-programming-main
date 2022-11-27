<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
</head>
<body>

<a href="/profit_part2/Lesson3/index.php">
    <button>Назад</button>
</a>

<h1><?php echo $article->title; ?></h1>
<h2><?php echo $article->lead; ?></h2>

<em>
    <?php
    if (!empty($article->author->first_name) && !empty($article->author->second_name)): //author возьмется из метода __get в модели article,
        //first_name и second_name возьмутся из модели author благодаря тому, что при реализации метода  return Author::findById($this->author_id);
        //использовался паттерн ORM ( вот так вот: $data = $db->query($sql, [':id' => $id], static::class); (static::class - это и есть ORM))
        echo $article->author->first_name . ' ' .$article->author->second_name;
    else:
        echo 'Нет автора';
    endif;
    ?>
</em>

</body>
</html>