<?php
include('class_krs.php');

if (isset($_GET['id'])) {
    $krs = new class_krs;
    $id = $_GET['id'];

    // Mengambil data KRS berdasarkan ID dengan INNER JOIN
    $data = $krs->getKRSByID($id);

    if ($data->num_rows > 0) {
        $row = $data->fetch_assoc();
        $id_jadwal = $row['id_jadwal'];
        $nim = $row['nim'];
        $kd_semester = $row['kd_semester'];
    } else {
        echo "<div class='alert alert-danger'>Data KRS tidak ditemukan.</div>";
        exit(); // Keluar dari skrip jika data tidak ditemukan
    }
} else {
    echo "<div class='alert alert-warning'>ID KRS tidak valid.</div>";
    exit(); // Keluar dari skrip jika parameter 'id' tidak ada
}

// Periksa apakah formulir telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data yang diterima dari formulir
    $id_jadwal_baru = $_POST['id_jadwal'];
    $nim_baru = $_POST['nim'];
    $kd_semester_baru = $_POST['kd_semester'];

    // Eksekusi perintah SQL untuk pembaruan data
    $result = $krs->edit_data($id, $id_jadwal_baru, $nim_baru, $kd_semester_baru);

    if ($result) {
        echo "<div class='alert alert-success'>Data KRS berhasil diperbarui.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal memperbarui data KRS.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit KRS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit KRS</h1>

        <!-- Formulir untuk mengedit data KRS -->
        <form method="POST" action="#">
            <div class="form-group">
                <label for="id_jadwal">ID Jadwal:</label>
                <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $id_jadwal; ?>" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM Mahasiswa:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>" required>
            </div>
            <div class="form-group">
                <label for="kd_semester">Kode Semester:</label>
                <input type="text" class="form-control" id="kd_semester" name="kd_semester" value="<?php echo $kd_semester; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
