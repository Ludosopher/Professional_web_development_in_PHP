<?php
/**
 * @var \App\models\User[] $users
 */
?>

<?php foreach ($users as $user) : ?>
    <h1><?= $user->login?></h1>
    <p>
        <a href="?c=user&a=one&id=<?= $user->id?>">
            <?= $user->name?>
        </a>
    </p>
<?php endforeach; ?>


