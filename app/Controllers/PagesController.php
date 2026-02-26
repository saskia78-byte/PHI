<?php
namespace App\Controllers;

use App\Core\Controller;

class PagesController extends Controller {
    
    public function home() {
        $this->render('pages/home');
    }

    public function actualites() {
        $this->render('pages/actualites');
    }

    public function contact() {
        $this->render('pages/contact');
    }

    public function nousoutenir() {
        $this->render('pages/nousoutenir');
    }

    public function error() {
        $this->render('pages/error');
    }
}
?>