<?php
class koneksi{
    public $con;

    function __construct(){
        $this->con=new mysqli("localhost","root","","db_pelatihan29");
    }

    function validasi_login($username,$password){
        $data=$this->con->query("select * from user where username='$username' and password='$password'");
        return $data;
    }
        function getAll(){
            $data=$this->con->query("select * from tbl_user");
            return $data;
        }

}
?>