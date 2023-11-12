<?php
include('../koneksi.php');

class class_dosen{
    public $con;

    function __construct(){
        $koneksi = new koneksi;
        $this->con = $koneksi->con;
    }

    function getAll(){
        $data = $this->con->query("SELECT * FROM tbl_dosen");
        return $data;
    }

    function add_data($kd_dosen, $nama, $alamat){
        $this->con->query("INSERT INTO tbl_dosen(kd_dosen, nama, alamat) VALUES ('$kd_dosen', '$nama', '$alamat')");
        return true;
    }

    function delete_dosen($kd_dosen){
        $this->con->query("DELETE FROM tbl_dosen WHERE kd_dosen='$kd_dosen'");
        return true;
    }

    function getDosenByID($kd_dosen){
        $data = $this->con->query("SELECT * FROM tbl_dosen WHERE kd_dosen='$kd_dosen'");
        return $data;
    }

    function edit_data($kd_dosen, $nama, $alamat){
        $this->con->query("UPDATE tbl_dosen SET kd_dosen= '$kd_dosen', nama= '$nama', alamat= '$alamat' WHERE kd_dosen='$kd_dosen'");
        return true;
    }
}
