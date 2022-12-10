<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
</head>
<body>

    <h1>Одна новость</h1>

    <article>
        <h2><?php echo $article->title; ?></h2>
        <div><?php echo $article->lead; ?></div>
    </article>
    <hr>
    <p>
        <a href="http://localhost/PHP-2-Professional-programming-main/Lesson5/">
            Читать все новости
        </a>
    </p>

</body>
</html>