<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Dosen</h1>
        <a href="index.php" class="btn btn-secondary mb-4">Kembali ke Daftar Dosen</a>

        <?php
        include('class_dosen.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dosen = new class_dosen;

            $kd_dosen = $_POST['kd_dosen'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];

            // Validasi input jika diperlukan
            if (empty($kd_dosen) || empty($nama) || empty($alamat)) {
                echo "<div class='alert alert-danger'>Harap isi semua kolom.</div>";
            } else {
                $result = $dosen->edit_data($kd_dosen, $nama, $alamat);

                if ($result) {
                    echo "<div class='alert alert-success'>Data dosen berhasil diubah.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah data dosen.</div>";
                }
            }
        } else {
            // Jika bukan metode POST, ambil data dosen yang akan diedit
            if (isset($_GET['kd_dosen'])) {
                $dosen = new class_dosen;
                $kd_dosen = $_GET['kd_dosen'];
                $data = $dosen->getDosenByID($kd_dosen);

                if ($data->num_rows > 0) {
                    $row = $data->fetch_assoc();
                    $kd_dosen = $row['kd_dosen'];
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                } else {
                    echo "<div class='alert alert-warning'>Data dosen tidak ditemukan.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <input type="hidden" name="kd_dosen" value="<?php echo $kd_dosen; ?>">
            <div class="form-group">
                <label for="nama">Nama Dosen:</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
