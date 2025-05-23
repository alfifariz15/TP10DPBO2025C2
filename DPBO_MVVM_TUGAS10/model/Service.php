<?php
require_once(__DIR__ . '/../config/Database.php');

class Service {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("
            SELECT s.*, v.owner_name, v.license_plate, m.name AS mechanic_name
            FROM service s
            JOIN vehicle v ON s.vehicle_id = v.id
            JOIN mechanic m ON s.mechanic_id = m.id
            ORDER BY s.service_date DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM service WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($vehicle_id, $mechanic_id, $description, $service_date) {
        $stmt = $this->pdo->prepare("
            INSERT INTO service (vehicle_id, mechanic_id, description, service_date)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$vehicle_id, $mechanic_id, $description, $service_date]);
    }

    public function update($id, $vehicle_id, $mechanic_id, $description, $service_date) {
        $stmt = $this->pdo->prepare("
            UPDATE service
            SET vehicle_id = ?, mechanic_id = ?, description = ?, service_date = ?
            WHERE id = ?
        ");
        return $stmt->execute([$vehicle_id, $mechanic_id, $description, $service_date, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM service WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
