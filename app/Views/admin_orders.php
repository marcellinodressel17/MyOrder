<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
    <style>
     body {
            background-color: #6c757d;
    }
</style>
</head>
<body>
<?php include('admin_navbar.php'); ?>
<div class="container mt-3">
    <div class="card mt-3">
        <div class="card-header">
            <h2>Daftar Order</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor Meja</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $order['menu_name']; ?></td>
                            <td><?= $order['quantity']; ?></td>
                            <td><?= $order['total_price']; ?></td>
                            <td><?= $order['customer_name']; ?></td>
                            <td><?= $order['table_number']; ?></td>
                            <td>
                                <?php if ($order['validated'] == 1) : ?>
                                    Sukses
                                <?php else : ?>
                                    <a href="<?= site_url('admin/validateOrder/' . $order['id']); ?>" class="btn btn-success">Validasi</a>
                                <?php endif; ?>
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

