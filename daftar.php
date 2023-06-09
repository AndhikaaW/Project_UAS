<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $username = $_POST['userName'];
    $password = $_POST['passwd'];
    $nama = $_POST['namaLengkap'];
    $email = $_POST['email'];
    $nohp = $_POST['no_hp'];


    $checkQuery = "SELECT * FROM tbl_user WHERE userName='$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<script lang="javascript">';
        echo 'alert("Username sudah terdaftar, Silakan gunakan username lain.")';
        echo  '</script>';
    } else {
        $insertQuery = "INSERT INTO tbl_user (userName, passwd, namaLengkap, email, no_hp) VALUES ('$username', '$password', '$nama', '$email', '$nohp')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['daftar_success'] = true;
            header("Location: index.html");
            exit();
        } else {
            echo "Terjadi kesalahan saat pendaftaran: " . $conn->$connect_error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/daftar.css">
    <style>
        body {
            font-family: Verdana;
        }
       .container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url(gambar/bg.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>Halaman Sign up</title>
</head>
<body>
    <div class="container">
        <div class="logreg-box">
            <div class="form-login">
                <form method="POST" action="daftar.php">
                    <h1>Sign Up</h1>
                    <div class="input-box">
                        <input type="text" name="userName" id="userName" required>
                        <label>Username</label><br><br>
                    </div>
                    <div class="input-box">
                        <input type="password" name="passwd" id="passwd" required>
                        <label>Password</label><br><br>
                    </div>
                    <div class="input-box">
                        <input type="text" name="namaLengkap" id="namaLengkap" required>
                        <label>Nama Lengkap </label><br><br>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" id="email" required>
                        <label>Email </label><br><br>
                    </div>
                    <div class="input-box">
                        <input type="text" name="no_hp" id="no_hp" required>                         
                        <label>No HP </label><br><br>
                    </div> 

                    <p>Already have an account? <a href="index.html"> Sign In</a></p>
                    <input type="submit" name="daftar" value="Sign Up" class="btn-masuk" >
                </form>
            </div>
        </div>
    </div>

</body>
</html>

