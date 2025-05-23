<?php
require_once(__DIR__ . '/../viewmodel/ServiceViewModel.php');
$viewModel = new ServiceViewModel();
$services = $viewModel->getAllServices();
?>

<?php include 'template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Servis</h2>
    <a href="index.php?entity=service&action=add" class="btn btn-primary">+ Tambah Servis</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Kendaraan</th>
            <th>Montir</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($serviceList as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['owner_name']) ?> (<?= htmlspecialchars($row['license_plate']) ?>)</td>
                <td><?= htmlspecialchars($row['mechanic_name']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['service_date']) ?></td>
                <td>
                    <a href="index.php?entity=service&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?entity=service&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'template/footer.php'; ?>