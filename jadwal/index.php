<?php
include('class_jadwal.php');

$jadwal = new class_jadwal;
$data_jadwal = $jadwal->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar Jadwal</h1>
        <a href="tambah.php" class="btn btn-primary mb-4">Tambah Jadwal</a>
        <a href="../home.php" class="btn btn-secondary mb-4">Kembali ke Menu</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dosen</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Ruang</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data_jadwal->num_rows > 0) {
                    while ($row = $data_jadwal->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama_dosen'] . "</td>";
                        echo "<td>" . $row['nama_matkul'] . "</td>";
                        echo "<td>" . $row['ruang'] . "</td>";
                        echo "<td>" . $row['waktu'] . "</td>";
                        echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data jadwal.</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
