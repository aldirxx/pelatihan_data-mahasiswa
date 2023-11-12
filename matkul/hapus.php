<?php
include('class_matkul.php');

if (isset($_GET['kd_matkul'])) {
    $matkul = new class_matkul;
    $kd_matkul = $_GET['kd_matkul'];

    $result = $matkul->delete_matkul($kd_matkul);

    if ($result) {
        header("Location: index.php"); // Redirect ke halaman daftar mata kuliah setelah menghapus
        exit();
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data mata kuliah.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Kode Mata Kuliah tidak valid.</div>";
}
?>
