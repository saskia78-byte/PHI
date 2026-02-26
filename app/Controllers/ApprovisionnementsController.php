<?php
namespace App\Controllers;

use App\Core\Controller;

class ApprovisionnementsController extends Controller {

    public function collecteRadio() {
        $this->render('pages/approvisionnement/collecteRadio');
    }

    public function collecteMateriel() {
        $this->render('pages/approvisionnement/collecteMateriel');
    }
}
?>