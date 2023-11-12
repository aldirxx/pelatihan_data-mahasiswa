<?php
include('class_jadwal.php');

if (isset($_GET['id'])) {
    $jadwal = new class_jadwal;
    $id = $_GET['id'];

    // Menghapus data jadwal berdasarkan ID
    $result = $jadwal->delete_jadwal($id);

    if ($result) {
        echo "<div class='alert alert-success'>Data jadwal berhasil dihapus.</div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data jadwal.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>ID jadwal tidak valid.</div>";
}
?>
