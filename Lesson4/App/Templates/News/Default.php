<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
</head>
<body>

<?php foreach ($news as $article): ?>
    <article>
        <h2><?php echo $article->title; ?></h2>
        <div><?php echo $article->lead; ?></div>
        <p>
            <a href="http://localhost/profit_part2/Lesson4/Index/One/?id=<?php echo $article->id; ?>">
                Читать далее...
            </a>
        </p>
    </article>

<?php endforeach; ?>

</body>
</html>