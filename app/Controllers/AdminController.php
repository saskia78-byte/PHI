<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Models\Managers\UsersManager;
    use App\Models\User;

    class AdminController extends Controller {

        private function checkAdmin() {
            if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] !== 1 || $_SESSION['role'] !== 'Admin') {
                header('location: index.php?controller=users&action=login');
                exit;
            }
        }    

        public function dashboard() {
            $this->checkAdmin();
            $this->render('admin/dashboard');
        }

        public function users() {
            $this->checkAdmin();
            $users = UsersManager::allUsers();
            $this->render('admin/users', ['users' => $users]);
        }

        public function addUser() {
            $this->checkAdmin();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['login']) &&
                    !empty($_POST['password']) &&
                    !empty($_POST['email'])) {

                    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $user = new User([
                        'login' => $_POST['login'],
                        'password' => $hashed_password,
                        'email' => $_POST['email'],
                        'id_role' => 2
                    ]);

                UsersManager::addUsers($user);

                header('location: ?controller=admin&action=users');
                exit;
                }
            }
            $this->render('admin/addUser');
        }

        public function delete() {
            $this->checkAdmin();
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_user'])) {

                $user = new User(array(
                    'id_user' => intval($_POST['id_user']),
                ));

                UsersManager::delete($user);
                
            }
            header('Location: ?controller=admin&action=users');
            exit;
        }

        public function edit() {
            $this->checkAdmin();

            // GET : Affichage du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['id_user'])) {
                $user = UsersManager::find(intval($_GET['id_user']));
                if (!$user) {
                    header('location: ?controller=admin&action=users');
                    exit;
                }
                $this->render('admin/edit', ['user' => $user]);
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_user'])) {
                $user = new User(array(
                    'id_user' => intval($_POST['id_user']),
                    'username' => $_POST['username'] ?? '',
                    'email' => $_POST['email'] ?? '',
                ));

                UsersManager::edit($user);
                header('location: ?controller=admin&action=users');
                exit;
            }
        }
    }
?>    