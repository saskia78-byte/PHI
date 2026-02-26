<?php
namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller {

    private function checkAdmin() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 1) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
    }    

    public function dashboard() {
        $this->checkAdmin();
        $this->render('admin/dashboard');
    }

    public function add() {
        $this->checkAdmin();
        $this->render('admin/add');
    }

    public function edit() {
        $this->checkAdmin();
        $this->render('admin/edit');
    }

    public function delete() {
    $this->checkAdmin();
    
}
}
?>