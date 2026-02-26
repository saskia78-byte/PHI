<?php
namespace App\Models\Managers;

use App\Core\Database;
use App\Models\Media;

class MediaManager {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM medias";
        $stmt = $this->db->query($sql);
        $medias = [];
        foreach ($stmt->fetchAll() as $row) {
            $medias[] = new Media($row);
        }
        return $medias;
    }

    public function getById($id) {
        $sql = "SELECT * FROM medias WHERE idMedia = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? new Media($row) : null;
    }

    public function getByArticle($idArticle) {
        $sql = "SELECT * FROM medias WHERE idArticle = :idArticle";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':idArticle' => $idArticle]);
        $medias = [];
        foreach ($stmt->fetchAll() as $row) {
            $medias[] = new Media($row);
        }
        return $medias;
    }

    public function getByPodcast($idPodcast) {
        $sql = "SELECT * FROM medias WHERE idPodcast = :idPodcast";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':idPodcast' => $idPodcast]);
        $medias = [];
        foreach ($stmt->fetchAll() as $row) {
            $medias[] = new Media($row);
        }
        return $medias;
    }

    public function create($data) {
        $sql = "INSERT INTO medias (image, audio, video, idArticle, idPodcast) VALUES (:image, :audio, :video, :idArticle, :idPodcast)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $sql = "DELETE FROM medias WHERE idMedia = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function update($id, $data) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "{$key} = :{$key}";
        }
        $setString = implode(', ', $set);
        $sql = "UPDATE medias SET {$setString} WHERE idMedia = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
}
?>