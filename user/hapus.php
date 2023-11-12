<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Hapus Pengguna</h1>

        <?php
        include('class_user.php');

        if (isset($_GET['id'])) {
            $user = new class_user;
            $id = $_GET['id'];

            $result = $user->delete_user($id);

            if ($result) {
                echo "<div class='alert alert-success'>Data pengguna berhasil dihapus.</div>";
            } else {
                echo "<div class='alert alert-danger'>Gagal menghapus data pengguna.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>ID Pengguna tidak valid.</div>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-4">Kembali ke Daftar Pengguna</a>
    </div>
</body>
</html>
