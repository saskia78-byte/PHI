<?php
namespace App\Core;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../Views/" . $view . ".php";
        $content = ob_get_clean();
        require __DIR__ . "/../Views/layouts/main.php";
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
}