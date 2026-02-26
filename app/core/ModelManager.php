<?php
namespace App\Core;

// use PDO;

class ModelManager {
    
    protected $db;
    protected $table;
    protected $entityClass;
    protected $primaryKey;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($sql);
        
        $entities = [];
        foreach ($stmt->fetchAll() as $row) {
            $entities[] = new $this->entityClass($row);
        }
        return $entities;
    }
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch();
        return $row ? new $this->entityClass($row) : null;
    }
    
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function update($id, $data) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "{$key} = :{$key}";
        }
        $setString = implode(', ', $set);
        
        $sql = "UPDATE {$this->table} SET {$setString} WHERE {$this->primaryKey} = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>