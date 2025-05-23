<?php
require_once(__DIR__ . '/../config/Database.php');

class Vehicle {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM vehicle");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM vehicle WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($owner_name, $license_plate, $type) {
        $stmt = $this->pdo->prepare("INSERT INTO vehicle (owner_name, license_plate, type) VALUES (?, ?, ?)");
        return $stmt->execute([$owner_name, $license_plate, $type]);
    }

    public function update($id, $owner_name, $license_plate, $type) {
        $stmt = $this->pdo->prepare("UPDATE vehicle SET owner_name = ?, license_plate = ?, type = ? WHERE id = ?");
        return $stmt->execute([$owner_name, $license_plate, $type, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM vehicle WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
