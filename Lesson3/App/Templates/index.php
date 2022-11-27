<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
</head>
<body>

<?php foreach ($this->news as $article): ?>

    <a href="<?php echo '/ProfIt_Part2/Lesson3/article.php?id=' . $article->id; ?>">
        <h1>
            <?php echo $article->title; ?>
        </h1>

        <article>
            <?php echo $article->lead; ?>
        </article>

        <em>
            <?php
            if (!empty($article->author->fullname)):
                echo $article->author->fullname;
            else:
                echo 'Нет автора';
            endif;
            ?>
        </em>
    </a>

<?php endforeach; ?>

</body>
</html>