<?php

class class_user {
    public $con;

    function __construct() {
     
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "db_pelatihan29";

        $this->con = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($this->con->connect_error) {
            die("Koneksi database gagal: " . $this->con->connect_error);
        }
    }

    function getAll() {
        $data = $this->con->query("SELECT * FROM tbl_user");
        return $data;
    }

    function add_data($id, $username, $password) {
        $query = "INSERT INTO tbl_user (id, username, password) VALUES ('$id', '$username', '$password')";
        if ($this->con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function delete_user($id) {
        $query = "DELETE FROM tbl_user WHERE id='$id'";
        if ($this->con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getUserByID($id) {
        $data = $this->con->query("SELECT * FROM tbl_user WHERE id='$id'");
        return $data;
    }

    function edit_data($id, $username, $password) {
        $query = "UPDATE tbl_user SET username='$username', password='$password' WHERE id='$id'";
        if ($this->con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

// Contoh penggunaan:
// $user = new class_user;
// $data = $user->getUserByID(1);
// print_r($data->fetch_assoc());
?>
