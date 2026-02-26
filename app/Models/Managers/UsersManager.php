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

    public function getAll() {
    $sql = "SELECT * FROM users";
    $stmt = $this->db->query($sql);
    $users = [];
    foreach ($stmt->fetchAll() as $row) {
        $users[] = new User($row);
    }
    return $users;
}

    public function create($data) {
        $sql = "INSERT INTO users (login, password, email, idRole) VALUES (:login, :password, :email, :idRole)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE users SET login = :login, email = :email WHERE idUser = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE idUser = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}