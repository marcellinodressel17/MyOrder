<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set Meja Status</title>
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
                <h1>Set Meja Status</h1>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/setMejaStatus/' . $meja['id']); ?>" method="POST">
                    <div class="form-group">
                        <label for="status">Status Meja:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="kosong">Terisi</option>
                            <option value="terisi">Kosong</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"  style="margin-top:20px">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
