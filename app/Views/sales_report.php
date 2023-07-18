<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Report</title>
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
            <h2>Laporan Penjualan</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Laku</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuSales as $menu) : ?>
                    <tr>
                        <td><?= $menu['menu_name']; ?></td>
                        <td><?= $menu['total_sales']; ?></td>
                        <td><?= $menu['total_revenue']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
