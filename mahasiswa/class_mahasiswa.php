<?php
include('../koneksi.php');

class class_mahasiswa{
    public $con;

    function __construct(){
        $koneksi = new koneksi;
        $this->con = $koneksi->con;
    }

    function getAll(){
        $data = $this->con->query("SELECT * FROM tbl_mhs");
        return $data;
    }

    function add_data($nim, $nama, $jurusan, $alamat){
        $this->con->query("INSERT INTO tbl_mhs(nim, nama, jurusan, alamat) VALUES('$nim', '$nama', '$jurusan', '$alamat')");
        return true;
    }

    function delete_mahasiswa($nim){
        $this->con->query("DELETE FROM tbl_mhs WHERE nim='$nim'");
        return true;
    }

    function getMahasiswaByNIM($nim){
        $data = $this->con->query("SELECT * FROM tbl_mhs WHERE nim='$nim'");
        return $data;
    }

    function edit_data($nim, $nama, $jurusan, $alamat){
        $this->con->query("UPDATE tbl_mhs SET nim= '$nim', nama= '$nama', jurusan= '$jurusan', alamat= '$alamat' WHERE nim='$nim'");
        return true;
    }
}
?>
