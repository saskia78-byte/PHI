<?php
namespace App\Models\Managers;

use App\Core\Database;
use App\Models\Podcast;

class PodcastManager {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM podcasts ORDER BY dateAjout DESC";
        $stmt = $this->db->query($sql);
        $podcasts = [];
        foreach ($stmt->fetchAll() as $row) {
            $podcasts[] = new Podcast($row);
        }
        return $podcasts;
    }

    public function getById($id) {
        $sql = "SELECT * FROM podcasts WHERE idPodcast = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? new Podcast($row) : null;
    }

    public function create($data) {
        $sql = "INSERT INTO podcasts (titre, description, idUser) VALUES (:titre, :description, :idUser)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE podcasts SET titre = :titre, description = :description WHERE idPodcast = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM podcasts WHERE idPodcast = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>