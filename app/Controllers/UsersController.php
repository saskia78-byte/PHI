<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\UsersManager;
use App\Models\Managers\ArticleManager;
use App\Models\Managers\PodcastManager;

class UsersController extends Controller {
    
    public function login() {
        if (isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
        }

        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';

            $usersManager = new UsersManager();
            $user = $usersManager->findByLogin($login);

            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['id_user'] = $user->getIdUser();
                $_SESSION['role'] = $user->getIdRole();
                $_SESSION['login'] = $login;
                $_SESSION['login_attempts'] = 0;
                unset($_SESSION['login_error']);
                $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
            } else {
                $_SESSION['login_attempts']++;
                if ($_SESSION['login_attempts'] >= 3) {
                    $_SESSION['login_error'] = "Login ou mot de passe incorrect après 3 tentatives";
                } else {
                    $_SESSION['login_error'] = "Login ou mot de passe incorrect";
                }
                $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
            }
        }

        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        $this->render('users/login', ['error' => $error]);
    }

    public function dashboard() {
        if (!isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
        $this->render('users/dashboard');
    }

    public function logout() {
        session_destroy();
        $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
    }

    // Gestion des articles
    public function addArticle() {
        if (!isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleManager = new ArticleManager();
            $articleManager->create([
                'titre'       => $_POST['titre'],
                'description' => $_POST['description'],
                'idUser'      => $_SESSION['id_user']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
        }
        $this->render('users/addArticle');
    }

    public function editArticle() {
        if (!isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
        $articleManager = new ArticleManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idArticle'])) {
            $articleManager->update($_POST['idArticle'], [
                'titre'       => $_POST['titre'],
                'description' => $_POST['description']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
        }
        $article = $articleManager->getById($_GET['idArticle'] ?? null);
        $this->render('users/editArticle', ['article' => $article]);
    }

    // Gestion des podcasts
    public function addPodcast() {
        if (!isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $podcastManager = new PodcastManager();
            $podcastManager->create([
                'titre'       => $_POST['titre'],
                'description' => $_POST['description'],
                'idUser'      => $_SESSION['id_user']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
        }
        $this->render('users/addPodcast');
    }

    public function editPodcast() {
        if (!isset($_SESSION['id_user'])) {
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/login');
        }
        $podcastManager = new PodcastManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['idPodcast'])) {
            $podcastManager->update($_POST['idPodcast'], [
                'titre'       => $_POST['titre'],
                'description' => $_POST['description']
            ]);
            $this->redirect(URL_ROOT_PUBLIC . '/index.php?url=users/dashboard');
        }
        $podcast = $podcastManager->getById($_GET['idPodcast'] ?? null);
        $this->render('users/editPodcast', ['podcast' => $podcast]);
    }
}
?>