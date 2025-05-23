<?php
require_once(__DIR__ . '/../model/Service.php');
require_once(__DIR__ . '/../model/Vehicle.php');
require_once(__DIR__ . '/../model/Mechanic.php');

class ServiceViewModel {
    private $model;
    private $vehicleModel;
    private $mechanicModel;

    public function __construct() {
        $this->model = new Service();
        $this->vehicleModel = new Vehicle();
        $this->mechanicModel = new Mechanic();
    }

    public function getAllServices() {
        return $this->model->getAll();
    }

    public function getServiceById($id) {
        return $this->model->getById($id);
    }

    public function addService($vehicle_id, $mechanic_id, $description, $service_date) {
        return $this->model->insert($vehicle_id, $mechanic_id, $description, $service_date);
    }

    public function updateService($id, $vehicle_id, $mechanic_id, $description, $service_date) {
        return $this->model->update($id, $vehicle_id, $mechanic_id, $description, $service_date);
    }

    public function deleteService($id) {
        return $this->model->delete($id);
    }

    public function getAllVehicles() {
        return $this->vehicleModel->getAll();
    }

    public function getAllMechanics() {
        return $this->mechanicModel->getAll();
    }
}
?>
