<?php

    session_start();
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../app/Config/Config.php';

    echo "<h1>Ma page d'accueil fonctionne !</h1>";

    use App\Core\Router;

    $router = new Router();
    $url = $_GET['url'] ?? '';

    if (!empty($url)) {
        $params = explode('/', trim($url, '/'));
        $controller = !empty($params[0]) ? $params[0] : 'pages';
        $action = !empty($params[1]) ? $params[1] : 'home';
    } else {
        $controller = 'pages';
        $action = 'home';
    }
    $router->callController($controller, $action);