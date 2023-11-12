<?php
include('class_jadwal.php');

$jadwal = new class_jadwal;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_dosen = $_POST['kd_dosen'];
    $kd_matkul = $_POST['kd_matkul'];
    $ruang = $_POST['ruang'];
    $waktu = $_POST['waktu'];

    // Menambahkan data jadwal baru
    $result = $jadwal->add_data($kd_dosen, $kd_matkul, $ruang, $waktu);

    if ($result) {
        echo "<div class='alert alert-success'>Data jadwal berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan data jadwal.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah Jadwal</h1>

        <!-- Formulir untuk menambahkan data jadwal -->
        <form method="POST" action="#">
            <div class="form-group">
                <label for="kd_dosen">Kode Dosen:</label>
                <input type="text" class="form-control" id="kd_dosen" name="kd_dosen" required>
            </div>
            <div class="form-group">
                <label for="kd_matkul">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" id="kd_matkul" name="kd_matkul" required>
            </div>
            <div class="form-group">
                <label for="ruang">Ruang:</label>
                <input type="text" class="form-control" id="ruang" name="ruang" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="text" class="form-control" id="waktu" name="waktu" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
