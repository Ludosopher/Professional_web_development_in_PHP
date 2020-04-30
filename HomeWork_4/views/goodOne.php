<?php
/**
 * @var \App\models\Good $good
 */
?>

<div class="product">
    <img src = "img/<?= $good->file_name?>">
    <h3><?= $good->product_name?></h3>
    <p> Цена: <?= $good->price?>$</p>
    <p>Число просмотров: <?= $good->views?></p>
    <a href="#">В корзину</a>
    <a href="#">Назад</a>
</div>