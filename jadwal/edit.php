    <?php
include('class_jadwal.php');

if (isset($_GET['id'])) {
    $jadwal = new class_jadwal;
    $id = $_GET['id'];

    // Mengambil data jadwal berdasarkan ID dengan INNER JOIN
    $data = $jadwal->getJadwalByID($id);

    if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
        $kd_dosen = $row['kd_dosen'];
        $kd_matkul = $row['kd_matkul'];
        $ruang = $row['ruang'];
        $waktu = $row['waktu'];
    } else {
        echo "<div class='alert alert-danger'>Data jadwal tidak ditemukan.</div>";
        exit(); // Keluar dari skrip jika data tidak ditemukan
    }
} else {
    echo "<div class='alert alert-warning'>ID jadwal tidak valid.</div>";
    exit(); // Keluar dari skrip jika parameter 'id' tidak ada
}

// Periksa apakah formulir telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data yang diterima dari formulir
    $kd_dosen_baru = $_POST['kd_dosen'];
    $kd_matkul_baru = $_POST['kd_matkul'];
    $ruang_baru = $_POST['ruang'];
    $waktu_baru = $_POST['waktu'];

    // Eksekusi perintah SQL untuk pembaruan data
    $result = $jadwal->edit_data($id, $kd_dosen_baru, $kd_matkul_baru, $ruang_baru, $waktu_baru);

    if ($result) {
        echo "<div class='alert alert-success'>Data jadwal berhasil diperbarui.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui data jadwal.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Jadwal</h1>

        <!-- Formulir untuk mengedit data jadwal -->
        <form method="POST" action="#">
            <div class="form-group">
                <label for="kd_dosen">Kode Dosen:</label>
                <input type="text" class="form-control" id="kd_dosen" name="kd_dosen" value="<?php echo $kd_dosen; ?>" required>
            </div>
            <div class="form-group">
                <label for="kd_matkul">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" id="kd_matkul" name="kd_matkul" value="<?php echo $kd_matkul; ?>" required>
            </div>
            <div class="form-group">
                <label for="ruang">Ruang:</label>
                <input type="text" class="form-control" id="ruang" name="ruang" value="<?php echo $ruang; ?>" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
