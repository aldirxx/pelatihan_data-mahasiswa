<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah Dosen</h1>
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
                $result = $dosen->add_data($kd_dosen, $nama, $alamat);

                if ($result) {
                    echo "<div class='alert alert-success'>Data dosen berhasil ditambahkan.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data dosen.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="kd_dosen">Kode Dosen:</label>
                <input type="text" class="form-control" name="kd_dosen">
            </div>
            <div class="form-group">
                <label for="nama">Nama Dosen:</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Dosen</button>
        </form>
    </div>
</body>
</html>
