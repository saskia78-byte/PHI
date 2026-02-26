<?php
namespace App\Controllers;

use App\Core\Controller;

class MobilisationsController extends Controller {

    public function ukraine() {
        $this->render('pages/mobilisation/ukraine');
    }

    public function senegal() {
        $this->render('pages/mobilisation/senegal');
    }

    public function mayotte() {
        $this->render('pages/mobilisation/mayotte');
    }

    public function birmanie() {
        $this->render('pages/mobilisation/birmanie');
    }
}
?>