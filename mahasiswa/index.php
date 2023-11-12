<?php
include('class_mahasiswa.php');

$mahasiswa = new class_mahasiswa;
$data_mahasiswa = $mahasiswa->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar Mahasiswa</h1>
        <a href="tambah.php" class="btn btn-primary mb-4">Tambah Data Mahasiswa</a>
        <a href="../home.php" class="btn btn-secondary mb-4">Kembali ke Menu</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data_mahasiswa->num_rows > 0) {
                    while ($row = $data_mahasiswa->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['jurusan'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td><a href='edit.php?nim=" . $row['nim'] . "' class='btn btn-warning btn-sm'>Edit</a> <a href='hapus.php?nim=" . $row['nim'] . "' class='btn btn-danger btn-sm'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data mahasiswa.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
