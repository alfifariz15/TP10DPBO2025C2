<?php
require_once(__DIR__ . '/../viewmodel/VehicleViewModel.php');
$viewModel = new VehicleViewModel();

$id = $owner_name = $license_plate = $type = "";
$isEdit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $viewModel->getVehicleById($id);
    if ($data) {
        $owner_name = $data['owner_name'];
        $license_plate = $data['license_plate'];
        $type = $data['type'];
        $isEdit = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $owner_name = $_POST['owner_name'];
    $license_plate = $_POST['license_plate'];
    $type = $_POST['type'];

    if ($id) {
        $viewModel->updateVehicle($id, $owner_name, $license_plate, $type);
    } else {
        $viewModel->addVehicle($owner_name, $license_plate, $type);
    }
    header("Location: index.php?entity=vehicle&action=list");
    exit;
}

if (isset($_GET['delete'])) {
    $viewModel->deleteVehicle($_GET['delete']);
    header("Location: index.php?entity=vehicle&action=list");
    exit;
}
?>

<?php include 'template/header.php'; ?>

<h2><?= isset($vehicle) ? 'Edit Kendaraan' : 'Tambah Kendaraan' ?></h2>

<form method="post" action="index.php?entity=vehicle&action=<?= isset($vehicle) ? 'update&id=' . $vehicle['id'] : 'save' ?>">
    <div class="mb-3">
        <label for="owner_name" class="form-label">Nama Pemilik:</label>
        <input type="text" class="form-control" id="owner_name" name="owner_name" required value="<?= $vehicle['owner_name'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="license_plate" class="form-label">Plat Nomor:</label>
        <input type="text" class="form-control" id="license_plate" name="license_plate" required value="<?= $vehicle['license_plate'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Jenis Kendaraan:</label>
        <input type="text" class="form-control" id="type" name="type" required value="<?= $vehicle['type'] ?? '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?entity=vehicle" class="btn btn-secondary">Kembali</a>
</form>

<?php include 'template/footer.php'; ?>