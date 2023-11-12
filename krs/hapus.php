<?php
include('class_krs.php');

if (isset($_GET['id'])) {
    $krs = new class_krs;
    $id = $_GET['id'];

    $result = $krs->delete_krs($id);

    if ($result) {
        echo "<div class='alert alert-success'>Data KRS berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data KRS.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>ID KRS tidak valid.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus KRS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Hapus KRS</h1>
        <a href="index.php" class="btn btn-secondary mt-4">Kembali ke Daftar KRS</a>
    </div>
</body>
</html>
