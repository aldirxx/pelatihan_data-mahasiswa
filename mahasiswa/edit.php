<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data Mahasiswa</h1>
        <a href="index.php" class="btn btn-primary mb-3">Kembali ke Daftar Mahasiswa</a>

        <?php
        include('class_mahasiswa.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mahasiswa = new class_mahasiswa;

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jurusan = $_POST['jurusan'];
            $alamat = $_POST['alamat'];

            // Validasi input jika diperlukan
            if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
                echo "<div class='alert alert-danger'>Harap isi semua kolom.</div>";
            } else {
                $result = $mahasiswa->edit_data($nim, $nama, $jurusan, $alamat);

                if ($result) {
                    echo "<div class='alert alert-success'>Data mahasiswa berhasil diubah.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengubah data mahasiswa.</div>";
                }
            }
        } else {
            // Jika bukan metode POST, ambil data mahasiswa yang akan diedit
            if (isset($_GET['nim'])) {
                $mahasiswa = new class_mahasiswa;
                $nim = $_GET['nim'];
                $data = $mahasiswa->getMahasiswaByNIM($nim);

                if ($data->num_rows > 0) {
                    $row = $data->fetch_assoc();
                    $nim = $row['nim'];
                    $nama = $row['nama'];
                    $jurusan = $row['jurusan'];
                    $alamat = $row['alamat'];
                } else {
                    echo "<div class='alert alert-danger'>Data mahasiswa tidak ditemukan.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <input type="hidden" name="nim" value="<?php echo $nim; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
