<?php
namespace App\Managers;

use App\Core\ModelManager;
use App\Models\User;

class UserManager extends ModelManager {

    protected $table = 'users';
    protected $entityClass = User::class;
    protected $primaryKey = 'idUser';

    public function findByLogin($login) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':login' => $login]);
        $row = $stmt->fetch();
        return $row ? new User($row) : null;
    }
}