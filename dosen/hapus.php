<?php
include('class_dosen.php');

if (isset($_GET['kd_dosen'])) {
    $dosen = new class_dosen;
    $kd_dosen = $_GET['kd_dosen'];

    $result = $dosen->delete_dosen($kd_dosen);

    if ($result) {
        header("Location: index.php"); // Redirect ke halaman daftar dosen setelah menghapus
        exit();
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data dosen.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Kode dosen tidak valid.</div>";
}
?>
