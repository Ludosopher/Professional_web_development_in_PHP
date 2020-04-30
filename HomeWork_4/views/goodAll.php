<?php
/**
 * @var \App\models\Good[] $goods
 */
?>
<?php echo "<div class = 'img_block'>" ?>
<?php foreach ($goods as $good) : ?>
    <div>
        <a href="?c=good&a=one&id=<?= $good->id?>"><img src = "img/<?= $good->file_name?>"></a>
        <h3><?= $good->product_name?></h3>
        <p>Цена: <?= $good->price?>$</p>
        <a href="#">Заказать</a>
    </div>
<?php endforeach; ?>
<?php echo "</div>" ?>