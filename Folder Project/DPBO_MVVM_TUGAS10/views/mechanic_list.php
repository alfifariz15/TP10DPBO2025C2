<?php
require_once(__DIR__ . '/../viewmodel/MechanicViewModel.php');
$viewModel = new MechanicViewModel();
$mechanics = $viewModel->getAllMechanics();
?>

<?php include 'template/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Montir</h2>
    <a href="index.php?entity=mechanic&action=add" class="btn btn-primary">+ Tambah Montir</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mechanicList as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['specialty']) ?></td>
                <td>
                    <a href="index.php?entity=mechanic&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?entity=mechanic&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'template/footer.php'; ?>
