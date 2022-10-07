<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
</head>
<body>

<?php foreach ($news as $article) { ?>

    <a href="<?php echo '/ProfIt_Part2/Lesson2/article.php?id=' . $article->id; ?>">
        <h1>
            <?php echo $article->title; ?>
        </h1>

        <article>
            <?php echo $article->lead; ?>
        </article>
    </a>

<?php } ?>

</body>
</html>