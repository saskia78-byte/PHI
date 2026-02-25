<?php
    namespace App\Core;

    use App\Controllers\PagesController;
    use App\Controllers\UsersController;
    use App\Controllers\AdminController;

    class Router { 

        private $routes = [ 
            'pages' => ['home', 'mobilisations', 'actualités', 'contact'], 
            'admin' => ['dashboard', 'add', 'edit'], 
            ]; 

        public function callController($controller, $action) { 

            list($controller, $action) = $this->validateRouter($controller, $action);

            switch($controller) {
                case 'pages':
                    $controllerInstance = new  PagesController();
                    break;
                case 'users':
                    $controllerInstance = new UsersController();
                    break;
                case 'admin':
                    $controllerInstance = new AdminController();
                    break;
                default:

                // enleve les erreurs en attendant / -> / Plus tard, remplacer ce null par un contrôleur d’erreur ou un PagesController->error() pour afficher une page 404.

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