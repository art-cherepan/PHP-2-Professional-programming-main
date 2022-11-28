<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <h1>Создать новость</h1>

        <form action="http://localhost/profit_part2/Lesson4/Admin/Create" method="post">

            <label>
                Заголовок новости:<br>
                <input type="text" name="title">
            </label>
            <label>
                Текст новости:<br>
                <textarea name="lead" cols="40" rows="10">
                </textarea>
            </label>
            <input type="submit">
        </form>

</body>
</html>
