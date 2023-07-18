<!-- menu.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyOrder</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<style>
     body {
            background-color: #ffc107;
    }
</style>
   
   
</head>
<body>
<div class="container">
        <div class="card mt-3">
            <div class="card-header">
    <h1>MyOrder</h1>
    <h5>Halo,mau makan apa hari ini ?</h5>
    <table>
        <thead>
        <table class="table table-bordered">
            <tr>
                <th>Menu</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['name']; ?></td>
                    <td><img src="<?= base_url('images/' . $product['picture']); ?>" alt="<?= $product['name']; ?>" style="width: 200px; height: 150px;" /></td>

                    <td><?= $product['price']; ?></td>
                    <td>
                    <a href="<?= site_url('myorder/addToCart/' . $product['id']); ?>" class="btn btn-warning">Tambahkan ke Keranjang</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= site_url('cart'); ?>" class="btn btn-warning cart-button" style="border: 1px solid #ccc;">Keranjang (<?= $cartCount; ?>)</a>
    <a href="<?= site_url('login'); ?>" class="btn btn-danger cart-button" style="border: 1px solid #ccc;margin-top:10px;margin-right:150px;">Admin</a>

</div>
</body>
</html>
