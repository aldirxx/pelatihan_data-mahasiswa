<?php
include('../koneksi.php');

class class_matkul{
    public $con;
    function __construct(){
        $koneksi = new koneksi;
        $this->con = $koneksi->con;
    }

    function getAll(){
        $data = $this->con->query("SELECT * FROM tbl_matkul");
        return $data;
    }

    function add_data($kd_matkul, $nama, $sks){
        $this->con->query("INSERT INTO tbl_matkul(kd_matkul, nama, sks) VALUES ('$kd_matkul', '$nama', '$sks')");
        return true;
    }

    function delete_matkul($kd_matkul){
        $this->con->query("DELETE FROM tbl_matkul WHERE kd_matkul='$kd_matkul'");
        return true;
    }

    function getMatkulByID($kd_matkul){
        $data = $this->con->query("SELECT * FROM tbl_matkul WHERE kd_matkul='$kd_matkul'");
        return $data;
    }

    function edit_data($kd_matkul, $nama, $sks){
        $this->con->query("UPDATE tbl_matkul SET kd_matkul='$kd_matkul', nama='$nama', sks='$sks' WHERE kd_matkul='$kd_matkul'");
        return true;
    }
}
?>
