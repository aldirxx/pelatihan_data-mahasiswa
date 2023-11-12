<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Hapus Data Mahasiswa</h1>

        <?php
        include('class_mahasiswa.php');

        if (isset($_GET['nim'])) {
            $mahasiswa = new class_mahasiswa;
            $nim = $_GET['nim'];

            $result = $mahasiswa->delete_mahasiswa($nim);

            if ($result) {
                echo "<div class='alert alert-success'>Data mahasiswa berhasil dihapus.</div>";
            } else {
                echo "<div class='alert alert-danger'>Gagal menghapus data mahasiswa.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>NIM Mahasiswa tidak valid.</div>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-4">Kembali ke Daftar Mahasiswa</a>
    </div>
</body>
</html>
