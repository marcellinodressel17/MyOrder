<!-- cart.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Saya</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
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
            <h1>Keranjang Belanja</h1>
            <?php if (empty($cartItems)) : ?>
                <p>Keranjang belanja masih kosong.</p>
            <?php else : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $index => $item) : ?>
                            <tr>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['price']; ?></td>
                                <td><?= $item['quantity']; ?></td>
                                <td>
                                    <a href="<?= site_url('cart/increaseQuantity/' . $index); ?>" class="btn btn-primary btn-sm">+</a>
                                    <a href="<?= site_url('cart/decreaseQuantity/' . $index); ?>" class="btn btn-primary btn-sm">-</a>
                                    <a href="<?= site_url('cart/removeItem/' . $index); ?>" class="btn btn-danger btn-sm">Hapus</a> <!-- Tambahkan tombol hapus -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <form action="<?= site_url('cart/processOrder'); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 10px;">
                        <label for="table_number">Nomor Meja:</label>
                        <select name="table_number" id="table_number" class="form-control" required>
                            <option value="" disabled selected>Pilih Nomor Meja</option>
                            <?php foreach ($meja as $row) : ?>
                                <option value="<?= $row['nomor_meja']; ?>"><?= $row['nomor_meja']; ?> - <?= $row['status']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="process_order">Proses Pesanan</button>
                    </div>
                </form>
            <?php endif; ?>
            <a href="<?= site_url('myorder'); ?>" class="btn btn-primary cart-button" style="border: 1px solid #ccc;margin-top:10px;">Kembali Ke Menu</a>
        </div>
    </div>
</div>
</body>
</html>
