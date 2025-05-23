<?php
require_once 'viewmodel/MechanicViewModel.php';
require_once 'viewmodel/VehicleViewModel.php';
require_once 'viewmodel/ServiceViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'mechanic';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'service') {
    $viewModel = new ServiceViewModel();

    if ($action == 'list') {
        $serviceList = $viewModel->getAllServices();
        require_once 'views/service_list.php';

    } elseif ($action == 'add') {
        $vehicleViewModel = new VehicleViewModel();
        $vehicles = $vehicleViewModel->getAllVehicles();
        require_once 'views/service_form.php';

    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $service = $viewModel->getServiceById($_GET['id']);
        $vehicleViewModel = new VehicleViewModel();
        $vehicles = $vehicleViewModel->getAllVehicles();
        require_once 'views/service_form.php';

    } elseif ($action == 'save') {
        $viewModel->addService($_POST['vehicle_id'], $_POST['mechanic_id'], $_POST['description'], $_POST['service_date']);
        header('Location: index.php?entity=service');

    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateService($_GET['id'], $_POST['vehicle_id'], $_POST['mechanic_id'], $_POST['description'], $_POST['service_date']);
        header('Location: index.php?entity=service');

    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteService($_GET['id']);
        header('Location: index.php?entity=service');
    }
} elseif ($entity == 'mechanic') {
    $viewModel = new MechanicViewModel();

    if ($action == 'list') {
        $mechanicList = $viewModel->getAllMechanics();
        require_once 'views/mechanic_list.php';

    } elseif ($action == 'add') {
        require_once 'views/mechanic_form.php';

    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $mechanic = $viewModel->getMechanicById($_GET['id']);
        require_once 'views/mechanic_form.php';

    } elseif ($action == 'save') {
        $viewModel->addMechanic($_POST['name'], $_POST['specialty']);
        header('Location: index.php?entity=mechanic');

    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateMechanic($_GET['id'], $_POST['name'], $_POST['specialty']);
        header('Location: index.php?entity=mechanic');

    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteMechanic($_GET['id']);
        header('Location: index.php?entity=mechanic');
    }

} elseif ($entity == 'vehicle') {
    $viewModel = new VehicleViewModel();

    if ($action == 'list') {
        $vehicleList = $viewModel->getAllVehicles();
        require_once 'views/vehicle_list.php';

    } elseif ($action == 'add') {
        $mechanicViewModel = new MechanicViewModel();
        $mechanics = $mechanicViewModel->getAllMechanics();
        require_once 'views/vehicle_form.php';

    } elseif ($action == 'edit' && isset($_GET['id'])) {
        $vehicle = $viewModel->getVehicleById($_GET['id']);
        $mechanicViewModel = new MechanicViewModel();
        $mechanics = $mechanicViewModel->getAllMechanics();
        require_once 'views/vehicle_form.php';

    } elseif ($action == 'save') {
        $viewModel->addVehicle($_POST['owner_name'], $_POST['license_plate'], $_POST['type']);
        header('Location: index.php?entity=vehicle');

    } elseif ($action == 'update' && isset($_GET['id'])) {
        $viewModel->updateVehicle($_GET['id'], $_POST['owner_name'], $_POST['license_plate'], $_POST['type']);
        header('Location: index.php?entity=vehicle');

    } elseif ($action == 'delete' && isset($_GET['id'])) {
        $viewModel->deleteVehicle($_GET['id']);
        header('Location: index.php?entity=vehicle');
    }
}

?>
