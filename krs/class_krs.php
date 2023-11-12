<?php
include('../koneksi.php');

class class_krs{
    public $con;
    function __construct(){
        $koneksi=new koneksi;
        $this->con=$koneksi->con;
    }

    function getAll(){
        $query = "SELECT krs.id, jadwal.id AS id_jadwal, mahasiswa.nim, semester.kd_semester
                  FROM tbl_krs AS krs
                  INNER JOIN tbl_jadwal AS jadwal ON krs.id_jadwal = jadwal.id
                  INNER JOIN tbl_mahasiswa AS mahasiswa ON krs.nim = mahasiswa.nim
                  INNER JOIN tbl_semester AS semester ON krs.kd_semester = semester.kd_semester";
        $data = $this->con->query($query);
        return $data;
    }

    function add_data($id_jadwal, $nim, $kd_semester){
        $query = "INSERT INTO tbl_krs (id_jadwal, nim, kd_semester) VALUES ('$id_jadwal', '$nim', '$kd_semester')";
        $this->con->query($query);
        return true;
    }

    function delete_krs($id){
        $query = "DELETE FROM tbl_krs WHERE id='$id'";
        $this->con->query($query);
        return true;
    }

    function getKRSByID($id){
        $query = "SELECT krs.id, jadwal.id AS id_jadwal, mahasiswa.nim, semester.kd_semester
                  FROM tbl_krs AS krs
                  INNER JOIN tbl_jadwal AS jadwal ON krs.id_jadwal = jadwal.id
                  INNER JOIN tbl_mahasiswa AS mahasiswa ON krs.nim = mahasiswa.nim
                  INNER JOIN tbl_semester AS semester ON krs.kd_semester = semester.kd_semester
                  WHERE krs.id='$id'";
        $data = $this->con->query($query);
        return $data;
    }

    function edit_data($id, $id_jadwal, $nim, $kd_semester){
        $query = "UPDATE tbl_krs SET id_jadwal='$id_jadwal', nim='$nim', kd_semester='$kd_semester' WHERE id='$id'";
        $this->con->query($query);
        return true;
    }
}
?>
