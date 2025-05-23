<?php
require_once(__DIR__ . '/../viewmodel/VehicleViewModel.php');
$viewModel = new VehicleViewModel();
$vehicles = $viewModel->getAllVehicles();
?>

<?php include 'template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Kendaraan</h2>
    <a href="index.php?entity=vehicle&action=add" class="btn btn-primary">+ Tambah Kendaraan</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Pemilik</th>
            <th>Plat Nomor</th>
            <th>Jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicleList as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['owner_name']) ?></td>
                <td><?= htmlspecialchars($row['license_plate']) ?></td>
                <td><?= htmlspecialchars($row['type']) ?></td>
                <td>
                    <a href="index.php?entity=vehicle&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?entity=vehicle&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'template/footer.php'; ?>