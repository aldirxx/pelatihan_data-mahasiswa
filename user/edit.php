<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Pengguna</h1>
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
                $result = $user->edit_data($id, $username, $password);

                if ($result) {
                    echo "<div class='alert alert-success'>Data pengguna berhasil diubah.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah data pengguna.</div>";
                }
            }
        } else {
            // Jika bukan metode POST, ambil data pengguna yang akan diedit
            if (isset($_GET['id'])) {
                $user = new class_user;
                $id = $_GET['id'];
                $data = $user->getUserByID($id);

                if ($data->num_rows > 0) {
                    $row = $data->fetch_assoc();
                    $id = $row['id'];
                    $username = $row['username'];
                    $password = $row['password'];
                } else {
                    echo "<div class='alert alert-warning'>Data pengguna tidak ditemukan.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
