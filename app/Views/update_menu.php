<!-- update_menu.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Menu</title>
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
                <h1>Update Menu</h1>
            </div>
            <div class="card-body">
                <form method="post" action="<?= site_url('admin/processUpdateMenu/' . $product['id']); ?>">
                    <div class="form-group">
                        <label for="menu_name">Menu Name:</label>
                        <input type="text" id="menu_name" name="menu_name" value="<?= $product['name']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" value="<?= $product['price']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Update Menu</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

