<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>

<body>

<?php
foreach ($this->data['news'] as $article) { ?>

    <a href="<?php echo '/PHP-2-Professional-programming-main/Lesson1/article.php?id=' . $article->id; ?>"> <?php echo $article->title; ?> </a>
    <br/>

<?php } ?>

</body>
</html>
