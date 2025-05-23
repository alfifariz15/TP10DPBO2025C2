<?php
require_once(__DIR__ . '/../model/Vehicle.php');

class VehicleViewModel {
    private $model;

    public function __construct() {
        $this->model = new Vehicle();
    }

    public function getAllVehicles() {
        return $this->model->getAll();
    }

    public function getVehicleById($id) {
        return $this->model->getById($id);
    }

    public function addVehicle($owner_name, $license_plate, $type) {
        return $this->model->insert($owner_name, $license_plate, $type);
    }

    public function updateVehicle($id, $owner_name, $license_plate, $type) {
        return $this->model->update($id, $owner_name, $license_plate, $type);
    }

    public function deleteVehicle($id) {
        return $this->model->delete($id);
    }
}
?>
