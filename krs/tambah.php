<?php
include('class_krs.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jadwal = $_POST['id_jadwal'];
    $nim = $_POST['nim'];
    $kd_semester = $_POST['kd_semester'];

    $krs = new class_krs;
    $result = $krs->add_data($id_jadwal, $nim, $kd_semester);

    if ($result) {
        echo "<div class='alert alert-success'>Data KRS berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan data KRS.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KRS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah KRS</h1>

        <!-- Formulir untuk menambah data KRS -->
        <form method="POST" action="#">
            <div class="form-group">
                <label for="id_jadwal">ID Jadwal:</label>
                <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM Mahasiswa:</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="kd_semester">Kode Semester:</label>
                <input type="text" class="form-control" id="kd_semester" name="kd_semester" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-4">Kembali ke Daftar KRS</a>
    </div>
</body>
</html>
