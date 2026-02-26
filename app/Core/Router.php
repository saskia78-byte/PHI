<?php
namespace App\Core;

use App\Controllers\PagesController;
use App\Controllers\UsersController;
use App\Controllers\AdminController;
use App\Controllers\ApprovisionnementsController;
use App\Controllers\MobilisationsController;

class Router {
    private $routes = [
        'pages'            => ['home', 'actualites', 'contact', 'nous-soutenir'],
        'approvisionnement'=> ['collecte-radio', 'collecte-materiel'],
        'mobilisation'     => ['ukraine', 'senegal', 'mayotte', 'birmanie'],
        'users'            => ['dashboard', 'login'],
        'admin'            => ['dashboard', 'add', 'edit'],
    ];

    public function callController($controller, $action) {
        list($controller, $action) = $this->validateRouter($controller, $action);
        switch($controller) {
            case 'pages':
                $controllerInstance = new PagesController();
                break;
            case 'approvisionnement':
                $controllerInstance = new ApprovisionnementsController();
                break;
            case 'mobilisation':
                $controllerInstance = new MobilisationsController();
                break;
            case 'users':
                $controllerInstance = new UsersController();
                break;
            case 'admin':
                $controllerInstance = new AdminController();
                break;
            default:
                $controllerInstance = null;
        }
        if ($controllerInstance) {
            $controllerInstance->{$action}();
        }
    }

    private function validateRouter($controller, $action) {
        if (!array_key_exists($controller, $this->routes)) {
            return ['pages', 'error'];
        }
        if (!in_array($action, $this->routes[$controller])) {
            return ['pages', 'error'];
        }
        return [$controller, $action];
    }
}
?>