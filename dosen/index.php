<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Daftar Dosen</h1>
        <a href="tambah.php" class="btn btn-primary mb-4">Tambah Dosen Baru</a>
        <a href="../home.php" class="btn btn-secondary mb-4">Kembali ke Menu</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Dosen</th>
                    <th>Nama Dosen</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('class_dosen.php');

                $dosen = new class_dosen;
                $data = $dosen->getAll();

                if ($data->num_rows > 0) {
                    while ($row = $data->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kd_dosen'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td><a href='edit.php?kd_dosen=" . $row['kd_dosen'] . "' class='btn btn-warning btn-sm'>Edit</a> <a href='hapus.php?kd_dosen=" . $row['kd_dosen'] . "' class='btn btn-danger btn-sm'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data dosen.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
