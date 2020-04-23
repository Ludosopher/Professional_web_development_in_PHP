<?php
include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$bd = new DB();
$user = new App\Models\Order($bd);
echo $user->getAll();
echo '<br>';
echo $user->getOne(12);