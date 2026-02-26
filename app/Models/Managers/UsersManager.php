<?php
namespace App\Models\Managers;

use App\Core\Database;
use App\Models\User;

class UsersManager {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByLogin($login) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':login' => $login]);
        $row = $stmt->fetch();
        return $row ? new User($row) : null;
    }

    public function findById($id) {
        $sql = "SELECT * FROM users WHERE idUser = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? new User($row) : null;
    }
}