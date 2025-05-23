<?php
require_once(__DIR__ . '/../model/Mechanic.php');

class MechanicViewModel {
    private $model;

    public function __construct() {
        $this->model = new Mechanic();
    }

    public function getAllMechanics() {
        return $this->model->getAll();
    }

    public function getMechanicById($id) {
        return $this->model->getById($id);
    }

    public function addMechanic($name, $specialty) {
        return $this->model->insert($name, $specialty);
    }

    public function updateMechanic($id, $name, $specialty) {
        return $this->model->update($id, $name, $specialty);
    }

    public function deleteMechanic($id) {
        return $this->model->delete($id);
    }
}
?>
