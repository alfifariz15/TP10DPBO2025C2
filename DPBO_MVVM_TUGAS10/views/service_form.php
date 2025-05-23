<?php
require_once(__DIR__ . '/../viewmodel/ServiceViewModel.php');
$viewModel = new ServiceViewModel();

$id = $vehicle_id = $mechanic_id = $description = $date = "";
$isEdit = false;

$vehicles = $viewModel->getAllVehicles();
$mechanics = $viewModel->getAllMechanics();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $viewModel->getServiceById($id);
    if ($data) {
        $vehicle_id = $data['vehicle_id'];
        $mechanic_id = $data['mechanic_id'];
        $description = $data['description'];
        $service_date = $data['service_date'];
        $isEdit = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $vehicle_id = $_POST['vehicle_id'];
    $mechanic_id = $_POST['mechanic_id'];
    $description = $_POST['description'];
    $service_date = $_POST['service_date'];

    if ($id) {
        $viewModel->updateService($id, $vehicle_id, $mechanic_id, $description, $service_date);
    } else {
        $viewModel->addService($vehicle_id, $mechanic_id, $description, $service_date);
    }
    header("Location: index.php?entity=service&action=list");
    exit;
}

if (isset($_GET['delete'])) {
    $viewModel->deleteService($_GET['delete']);
    header("Location: index.php?entity=service&action=list");
    exit;
}
?>

<?php include 'template/header.php'; ?>

<h2><?= isset($service) ? 'Edit Servis' : 'Tambah Servis' ?></h2>

<form method="post" action="index.php?entity=service&action=<?= isset($service) ? 'update&id=' . $service['id'] : 'save' ?>">
    <div class="mb-3">
        <label for="vehicle_id" class="form-label">Kendaraan</label>
        <select class="form-select" id="vehicle_id" name="vehicle_id" required>
            <option value="">-- Pilih Kendaraan --</option>
            <?php foreach ($vehicles as $v): ?>
                <option value="<?= $v['id'] ?>" <?= isset($service) && $service['vehicle_id'] == $v['id'] ? 'selected' : '' ?>>
                    <?= $v['license_plate'] ?> (<?= $v['owner_name'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="mechanic_id" class="form-label">Montir</label>
        <select class="form-select" id="mechanic_id" name="mechanic_id" required>
            <option value="">-- Pilih Montir --</option>
            <?php foreach ($mechanics as $m): ?>
                <option value="<?= $m['id'] ?>" <?= isset($service) && $service['mechanic_id'] == $m['id'] ? 'selected' : '' ?>>
                    <?= $m['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Servis:</label>
        <input type="text" class="form-control" id="description" name="description" required value="<?= $service['description'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label for="service_date" class="form-label">Tanggal Servis</label>
        <input type="date" class="form-control" id="service_date" name="service_date" required value="<?= $service['service_date'] ?? date('Y-m-d') ?>">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?entity=service" class="btn btn-secondary">Kembali</a>
</form>

<?php include 'template/footer.php'; ?>