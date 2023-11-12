<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Mata Kuliah</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Kembali ke Daftar Mata Kuliah</a>

        <?php
        include('class_matkul.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $matkul = new class_matkul;

            $kd_matkul = $_POST['kd_matkul'];
            $nama = $_POST['nama'];
            $sks = $_POST['sks'];

            // Validasi input jika diperlukan
            if (empty($kd_matkul) || empty($nama) || empty($sks)) {
                echo "<div class='alert alert-danger'>Harap isi semua kolom.</div>";
            } else {
                $result = $matkul->edit_data($kd_matkul, $nama, $sks);

                if ($result) {
                    echo "<div class='alert alert-success'>Data mata kuliah berhasil diubah.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah data mata kuliah.</div>";
                }
            }
        } else {
            // Jika bukan metode POST, ambil data mata kuliah yang akan diedit
            if (isset($_GET['kd_matkul'])) {
                $matkul = new class_matkul;
                $kd_matkul = $_GET['kd_matkul'];
                $data = $matkul->getMatkulByID($kd_matkul);

                if ($data->num_rows > 0) {
                    $row = $data->fetch_assoc();
                    $kd_matkul = $row['kd_matkul'];
                    $nama = $row['nama'];
                    $sks = $row['sks'];
                } else {
                    echo "<div class='alert alert-warning'>Data mata kuliah tidak ditemukan.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <input type="hidden" name="kd_matkul" value="<?php echo $kd_matkul; ?>">
            <div class="form-group">
                <label for="nama">Nama Mata Kuliah:</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="sks">SKS:</label>
                <input type="number" class="form-control" name="sks" value="<?php echo $sks; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
