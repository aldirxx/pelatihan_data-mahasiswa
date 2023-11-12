<?php
include('../koneksi.php');

class class_jadwal
{
    public $con;

    function __construct()
    {
        $koneksi = new koneksi;
        $this->con = $koneksi->con;
    }

    function getAll()
    {
        $query = "SELECT j.id, d.nama AS nama_dosen, m.nama AS nama_matkul, j.ruang, j.waktu
                  FROM tbl_jadwal AS j
                  INNER JOIN tbl_dosen AS d ON j.kd_dosen = d.kd_dosen
                  INNER JOIN tbl_matkul AS m ON j.kd_matkul = m.kd_matkul";
        $data = $this->con->query($query);
        return $data;
    }

    function add_data($kd_dosen, $kd_matkul, $ruang, $waktu)
    {
        $query = "INSERT INTO tbl_jadwal (kd_dosen, kd_matkul, ruang, waktu) VALUES ('$kd_dosen', '$kd_matkul', '$ruang', '$waktu')";
        $result = $this->con->query($query);
        return $result;
    }

    function delete_jadwal($id)
    {
        $query = "DELETE FROM tbl_jadwal WHERE id='$id'";
        $result = $this->con->query($query);
        return $result;
    }

    function getJadwalByID($id)
    {
        $query = "SELECT j.id, d.nama AS nama_dosen, m.nama AS nama_matkul, j.ruang, j.waktu
                  FROM tbl_jadwal AS j
                  INNER JOIN tbl_dosen AS d ON j.kd_dosen = d.kd_dosen
                  INNER JOIN tbl_matkul AS m ON j.kd_matkul = m.kd_matkul
                  WHERE j.id='$id'";
        $data = $this->con->query($query);
        return $data;
    }

    function edit_data($id, $kd_dosen, $kd_matkul, $ruang, $waktu)
    {
        $query = "UPDATE tbl_jadwal SET kd_dosen='$kd_dosen', kd_matkul='$kd_matkul', ruang='$ruang', waktu='$waktu' WHERE id='$id'";
        $result = $this->con->query($query);
        return $result;
    }
}
?>
