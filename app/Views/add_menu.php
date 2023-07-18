
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Menu</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <style>
     body {
            background-color: #6c757d;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h1>Tambah Menu</h1>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('admin/processAddMenu'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="menu_name">Nama Menu:</label>
                        <input type="text" id="menu_name" name="menu_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga:</label>
                        <input type="number" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar:</label>
                        <input type="file" id="image" name="image" class="form-control-file" style="margin-top:20px;"required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:20px;">Add Menu</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
