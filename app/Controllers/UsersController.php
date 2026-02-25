<?php

    namespace App\Controllers;

    use App\Core\Controller;
    use App\Models\Managers\UsersManager;

    class UsersController extends Controller {
        
        public function login() {

            if (isset($_SESSION['id_user'])) {
                header('location: index.php?controller=users&action=dashboard');
                exit;
            }

            // Initialiser le compteur si nécessaire
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 0;
            }

            // Si le formulaire est soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login = $_POST['login'] ?? '';
                $password = $_POST['password'] ?? '';

                $user = UsersManager::logAuth($login);

                if ($user && password_verify($password, $user->getPassword())) {
                    // Connexion réussie
                    $_SESSION['id_user'] = $user->getId_user();
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['login'] = $login;
                    $_SESSION['login_attempts'] = 0;
                    unset($_SESSION['login_error']); // reset erreur si succès
                    header('location: index.php?controller=users&action=dashboard');
                    exit;
                } else {
                    // Échec : incrément du compteur
                    $_SESSION['login_attempts']++;

                    if ($_SESSION['login_attempts'] >= 3) {
                        $_SESSION['login_error'] = "Login ou mot de passe incorrect après 3 tentatives";
                    } else {
                        $_SESSION['login_error'] = "Login ou mot de passe incorrect";
                    }

                    header('location: index.php?controller=users&action=login'); // redirige pour “GET”
                    exit;
                }
            }

            // Affichage du formulaire (GET)
            $error = $_SESSION['login_error'] ?? null;
            unset($_SESSION['login_error']); // on supprime après affichage
            $this->render('users/login', ['error' => $error]);
        }

        public function dashboard() {


            if (!isset($_SESSION['id_user'])) {
                header('location: index.php?controller=users&action=login');
                exit;
            }
            $this->render('users/dashboard');
        }

        public function logout() {

            session_destroy();

            unset($_SESSION['id_user']);

            header('location: index.php?controller=users&action=login');
            exit;
        }
    }

?>