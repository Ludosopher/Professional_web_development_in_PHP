<?php
//use App\services\Autoloader;
use App\services\renderers\TwigRenderer;

//include dirname(__DIR__) . '/services/Autoloader.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
//include dirname(__DIR__) . '/vendor/autoload.php';
//spl_autoload_register([new Autoloader(), 'loadClass']);

//
// $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/views');
// $twig = new \Twig\Environment($loader);

//echo $twig->render('layouts/main.twig', ['foo']);
//

$controllerName = 'good';
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
     * @var \App\controllers\Controller $controller
     */

    $renderer = new TwigRenderer();
    $controller = new $controllerClass($renderer);
    echo $controller->run($actionName);
}