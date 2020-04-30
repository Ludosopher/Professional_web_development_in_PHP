<?php
use App\services\Autoloader;
include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([new Autoloader(), 'loadClass']);

$controllerName = 'user';
if (!empty($_GET['c'])) {
    $controllerName = $_GET['c'];
}

$actionName = '';
if (!empty($_GET['a'])) {
    $actionName = $_GET['a'];
}

//\App\controllers\UserController
$controllerClass = '\\App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /**
     * @var \App\controllers\UserController $controller
     */
    $controller = new $controllerClass();
    echo $controller->run($actionName);
}

// $user = new \App\models\User();
// // $user->is_admin = Null;
// // $user->name = 'Виктория';
// $user->login = 'guru';
// $user->password = '000';
// //$user->date = '1991-07-12';
// // $user->update(11);
// //$user->delete(11);
// $user->save(19);
