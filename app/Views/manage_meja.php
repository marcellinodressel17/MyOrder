
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Meja</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <style>
     body {
            background-color: #6c757d;
    }
</style>
</head>
<body>
<?php include('admin_navbar.php'); ?>
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h1>Manage Meja</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor Meja</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($meja as $row) : ?>
                        <tr>
                            <td><?= $row['nomor_meja']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td>
                                <a href="<?= site_url('admin/setStatusMeja/' . $row['id']); ?>" class="btn btn-primary btn-sm">Ubah Status</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
