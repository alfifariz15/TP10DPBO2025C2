<?php
require_once(__DIR__ . '/../config/Database.php');

class Mechanic {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM mechanic");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM mechanic WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($name, $specialty) {
        $stmt = $this->pdo->prepare("INSERT INTO mechanic (name, specialty) VALUES (?, ?)");
        return $stmt->execute([$name, $specialty]);
    }

    public function update($id, $name, $specialty) {
        $stmt = $this->pdo->prepare("UPDATE mechanic SET name = ?, specialty = ? WHERE id = ?");
        return $stmt->execute([$name, $specialty, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM mechanic WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
