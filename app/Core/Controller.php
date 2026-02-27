<?php
namespace App\Core;

class Controller {
    protected function render($view, $data = [], $layout = 'main') {
        extract($data);
        ob_start();
        require __DIR__ . "/../Views/" . $view . ".php";
        $content = ob_get_clean();
        require __DIR__ . "/../Views/layouts/" . $layout . ".php";
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
}