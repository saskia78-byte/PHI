<?php
    namespace App\Controllers;

    use App\Core\Controller;

    class PagesController extends Controller {
        
        public function home() {
            $this->render('pages/home');
        }
    }
?>    