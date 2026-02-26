<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\UsersManager;

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
}
?>