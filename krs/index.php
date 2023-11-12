<?php
include('class_krs.php');

$krs = new class_krs;
$data_krs = $krs-> getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar KRS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar KRS</h1>
        <a href="tambah.php" class="btn btn-success mb-3">Tambah KRS</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Jadwal</th>
                    <th>NIM Mahasiswa</th>
                    <th>Kode Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data_krs->num_rows > 0) {
                    while ($row = $data_krs->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['id_jadwal'] . "</td>";
                        echo "<td>" . $row['nim'] . "</td>";
                        echo "<td>" . $row['kd_semester'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm ml-2'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data KRS.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
