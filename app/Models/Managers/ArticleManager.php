<?php
namespace App\Models\Managers;

use App\Core\Database;
use App\Models\Article;

class ArticleManager {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM articles ORDER BY dateAjout DESC";
        $stmt = $this->db->query($sql);
        $articles = [];
        foreach ($stmt->fetchAll() as $row) {
            $articles[] = new Article($row);
        }
        return $articles;
    }

    public function getById($id) {
        $sql = "SELECT * FROM articles WHERE idArticle = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? new Article($row) : null;
    }

    public function create($data) {
        $sql = "INSERT INTO articles (titre, description, idUser) VALUES (:titre, :description, :idUser)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE articles SET titre = :titre, description = :description WHERE idArticle = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM articles WHERE idArticle = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>