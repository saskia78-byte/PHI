<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\UsersManager;
use App\Models\Managers\ArticleManager;
use App\Models\Managers\MediaManager;
use App\Models\Managers\PodcastManager;
use App\Models\User;

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

    // Gestion des users
    public function addUser() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
                $usersManager = new UsersManager();
                $usersManager->create([
                    'login'    => $_POST['login'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'email'    => $_POST['email'],
                    'idRole'   => 2
                ]);
                $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
            }
        }
        $this->render('admin/addUser');
    }

    public function editUser() {
        $this->checkAdmin();
        $usersManager = new UsersManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idUser'])) {
            $usersManager->update($_POST['idUser'], [
                'login' => $_POST['login'],
                'email' => $_POST['email']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $user = $usersManager->findById($_GET['idUser'] ?? null);
        $this->render('admin/editUser', ['user' => $user]);
    }

    public function deleteUser() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idUser'])) {
            $usersManager = new UsersManager();
            $usersManager->delete($_POST['idUser']);
        }
        $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
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

    // Gestion des articles
    public function addArticle() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleManager = new ArticleManager();
            $articleManager->create([
                'titre'       => $_POST['titre'],
                'description' => $_POST['description'],
                'idUser'      => $_SESSION['id_user']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $this->render('admin/addArticle');
    }

    public function editArticle() {
        $this->checkAdmin();
        $articleManager = new ArticleManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idArticle'])) {
            $articleManager->update($_POST['idArticle'], [
                'titre'       => $_POST['titre'],
                'description' => $_POST['description']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $article = $articleManager->getById($_GET['idArticle'] ?? null);
        $this->render('admin/editArticle', ['article' => $article]);
    }

    public function deleteArticle() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idArticle'])) {
            $articleManager = new ArticleManager();
            $articleManager->delete($_POST['idArticle']);
        }
        $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
    }

    // Gestion des podcasts
    public function addPodcast() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $podcastManager = new PodcastManager();
            $podcastManager->create([
                'titre'       => $_POST['titre'],
                'description' => $_POST['description'],
                'idUser'      => $_SESSION['id_user']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $this->render('admin/addPodcast');
    }

    public function editPodcast() {
        $this->checkAdmin();
        $podcastManager = new PodcastManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idPodcast'])) {
            $podcastManager->update($_POST['idPodcast'], [
                'titre'       => $_POST['titre'],
                'description' => $_POST['description']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $podcast = $podcastManager->getById($_GET['idPodcast'] ?? null);
        $this->render('admin/editPodcast', ['podcast' => $podcast]);
    }

    public function deletePodcast() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idPodcast'])) {
            $podcastManager = new PodcastManager();
            $podcastManager->delete($_POST['idPodcast']);
        }
        $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
    }

    // Gestion des médias
    public function addMedia() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mediaManager = new MediaManager();
            $mediaManager->create([
                'image'     => $_POST['image'] ?? null,
                'audio'     => $_POST['audio'] ?? null,
                'video'     => $_POST['video'] ?? null,
                'idArticle' => $_POST['idArticle'] ?? null,
                'idPodcast' => $_POST['idPodcast'] ?? null,
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
        }
        $this->render('admin/addMedia');
    }

    public function deleteMedia() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idMedia'])) {
            $mediaManager = new MediaManager();
            $mediaManager->delete($_POST['idMedia']);
        }
        $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=admin/dashboard');
    }
}
?>