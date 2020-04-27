<?php
use App\services\Autoloader;
use App\services\DB;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

// $user = new \App\models\User();
// $users = $user->getAll();
// var_dump($users);
// echo '<br><br>';

// $user = new \App\models\User();
// $users = $user->getOne(11);
// var_dump($users);
// echo '<br><br>';

// $user = new \App\models\User();
// $user->is_admin = Null;
// $user->name = 'Вика';
// $user->login = 'Vika';
// $user->password = '321';
// $user->date = '1991-07-12';
// $user->insert();

// $user = new \App\models\User();
// $user->login = 'lucky';
// $user->password = '777';
// $user->update(9);



