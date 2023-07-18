<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <style>
        body {
            background-color: #ffc107; /* Warna latar belakang */
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 100px;
        }
        .card {
            border: 1px solid #ccc;
        }
        .card-header {
            text-align: center;
            background-color: #ffffff; /* Warna latar belakang header */
            border-bottom: none;
        }
        .card-body {
            padding: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0;
            margin-bottom: 10px; /* Menambahkan jarak antara form password dan tombol login */
        }
        .btn-primary {
            border-radius: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Login Admin</h3>
            </div>
            <div class="card-body">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form action="<?= site_url('login/process'); ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
