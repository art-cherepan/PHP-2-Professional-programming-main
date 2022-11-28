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

        <h1>Список новостей</h1>

        <table>
            <tr>
                <th>№</th>
                <th>Заголовок</th>
                <th></th>
            </tr>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td>
                        <a href="http://localhost/profit_part2/Lesson4/Admin/Edit/?id=<?php echo $item->id; ?>">
                            Редактировать
                        </a>
                        <a href="http://localhost/profit_part2/Lesson4/Admin/Delete/?id=<?php echo $item->id; ?>">
                            Удалить
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

</body>
</html>
