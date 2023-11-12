<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah Mata Kuliah</h1>
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
                $result = $matkul->add_data($kd_matkul, $nama, $sks);

                if ($result) {
                    echo "<div class='alert alert-success'>Data mata kuliah berhasil ditambahkan.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data mata kuliah.</div>";
                }
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="kd_matkul">Kode Mata Kuliah:</label>
                <input type="text" class="form-control" name="kd_matkul">
            </div>
            <div class="form-group">
                <label for="nama">Nama Mata Kuliah:</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="sks">SKS:</label>
                <input type="number" class="form-control" name="sks">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
        </form>
    </div>
</body>
</html>
