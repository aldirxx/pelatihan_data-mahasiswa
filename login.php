<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_pelatihan29';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
    
        header('Location: home.php');
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Responsive Form Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <section>
        <div class="login-box">
            <form action="" method="post">
                <h2>Login Sistem Kasir</h2>
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label for="email">Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" name="login">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="#">Register</a></p>
                </div>
            </form>
        </div>
        <?php if (isset($error_message)) {
            echo "<p>$error_message</p>";
        } ?>
    </section>
</body>
</html>
