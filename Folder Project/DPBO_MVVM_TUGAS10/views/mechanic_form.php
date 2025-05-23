<?php
require_once(__DIR__ . '/../viewmodel/MechanicViewModel.php');
$viewModel = new MechanicViewModel();

$id = $name = $specialty = "";
$isEdit = false;

// Handle GET (edit)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $viewModel->getMechanicById($id);
    if ($data) {
        $name = $data['name'];
        $specialty = $data['specialty'];
        $isEdit = true;
    }
}

// Handle POST (insert/update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];

    if ($id) {
        $viewModel->updateMechanic($id, $name, $specialty);
    } else {
        $viewModel->addMechanic($name, $specialty);
    }
    header("Location: index.php?entity=mechanic");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $viewModel->deleteMechanic($_GET['delete']);
    header("Location: index.php?entity=mechanic");
    exit;
}
?>

<?php include 'template/header.php'; ?>

<h2><?= isset($mechanic) ? 'Edit Montir' : 'Tambah Montir' ?></h2>

<form method="post" action="index.php?entity=mechanic&action=<?= isset($mechanic) ? 'update&id=' . $mechanic['id'] : 'save' ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Montir</label>
        <input type="text" class="form-control" id="name" name="name" required value="<?= $mechanic['name'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="specialty" class="form-label">Keahlian</label>
        <input type="text" class="form-control" id="specialty" name="specialty" required value="<?= $mechanic['specialty'] ?? '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php?entity=mechanic" class="btn btn-secondary">Kembali</a>
</form>

<?php include 'template/footer.php'; ?>
