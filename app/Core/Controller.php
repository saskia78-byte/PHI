<?php
    namespace App\Core;

    class Controller {

        protected function render($view, $data = []) {

            extract($data);

            // Capture le contenu de la vue
            ob_start();
            require __DIR__ . "/../Views/" . $view . ".php";
            $content = ob_get_clean();

            // Charge le layout
            require __DIR__ . "/../Views/layouts/main.php";
        }
    }