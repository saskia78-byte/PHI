<?php

    session_start();

    require_once __DIR__ . '../vendor/autoload.php';

    use App\Core\Router;

    $router = new Router();
    $controller = $_GET['controller'] ?? 'pages';
    $action = $_GET['action'] ?? 'home';

    $router->callController($controller, $action);