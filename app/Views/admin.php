<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
    <style>
     body {
            background-color: #6c757d;
    }
</style>
    
</style>
</head>
<body>
<?php include('admin_navbar.php'); ?>
<div class="container mt-3">
    <div class="card mt-3">
        <div class="card-header">
            <h2>Daftar Menu</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['name']; ?></td>
                                <td><?= $product['price']; ?></td>
                                <td>
                                    <a href="<?= site_url('admin/updateMenu/' . $product['id']); ?>" class="btn btn-primary">Update</a>
                                    <a href="<?= site_url('admin/deleteMenu/' . $product['id']); ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= site_url('admin/addMenu'); ?>" class="btn btn-primary custom-button" style="border: 1px solid #ccc;margin-top:10px; margin-right:10px;">Tambah Menu</a>
            <a href="<?= site_url('logout'); ?>" class="btn btn-danger custom-button" style="border: 1px solid #ccc;margin-top:10px;margin-right:150px;">LogOut</a>
        </div>
    </div>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
