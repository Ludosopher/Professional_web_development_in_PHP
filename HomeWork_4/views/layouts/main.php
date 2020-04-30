<?php
/**
 * @var string $content
 */
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="?c=user&a=all">Пользователи</a></li>
        <li><a href="?c=good&a=all">Каталог товаров</a></li>
    </ul>

<div class="">
    <?= $content; ?>
</div>
</body>
</html>