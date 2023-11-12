<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah Pengguna</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Kembali ke Daftar Pengguna</a>

        <?php
        include('class_user.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new class_user;

            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validasi input jika diperlukan
            if (empty($id) || empty($username) || empty($password)) {
                echo "<div class='alert alert-danger'>Harap isi semua kolom.</div>";
            } else {
                $result = $user->add_data($id, $username, $password);

                if ($result) {
                    echo "<div class='alert alert-success'>Data pengguna berhasil ditambahkan.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data pengguna.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
    </div>
</body>
</html>
