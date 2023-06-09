<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['input'])) {
    $judul = $_POST['judul'];
    $intro = $_POST['intro'];
    $reff = $_POST['reff'];
    $outro = $_POST['outro'];

    $query = "SELECT * FROM tbl_lagu WHERE judul='$judul'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<script lang="javascript">';
        echo 'alert("lagu sudah tersedia, silahkan masukkan kembali")';
        echo  '</script>';
    } else {
        $insertQuery = "INSERT INTO tbl_lagu (judul, intro, reff, outro) VALUES ('$judul', '$intro', '$reff','$outro')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['input_success'] = true;
            header("Location: list_lagu.php");
            exit();
        } else {
            echo "Input yang anda masukkan salah" . $conn->$connect_error;
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
    <title>Input Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bg.css">
    <link rel="stylesheet" href="css/input_lagu.css">
</head>
<body>
<nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="navbar-brand">LyricLab</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="menu.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="input_lagu.php">Input lirik</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="list_lagu.php">List lagu</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tentang.html">Tentang</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <a href="index.html">Log Out</a>
                    </form>
                </div>
            </div>
        </nav>
    </nav>

<div class="form-login">
            <form method="POST" action="input_lagu.php">
                <h1>Silahkan masukkan chord dan lirik lagu</h1><br><br>
                
                <div class="input-judul">
                    <label><b>Judul</b></label><br><br>    
                    <input type="text" name="judul" required><br><br>
                </div>     

                <div class="input-box">
                    <label><b>Intro</b> </label><br>    
                    <textarea name="intro" cols="30" rows="10"></textarea><br><br>
                </div>                    
                
                <div class="input-box">
                    <label><b>Reff</b> </label><br>
                    <textarea name="reff" cols="30" rows="10"></textarea><br><br>
                </div> 

                <div class="input-box">
                    <label><b>Outro</b> </label><br>
                    <textarea name="outro" cols="30" rows="10"></textarea><br><br>
                </div> 

                <input type="submit" name="input" value="Kirim" class="btn-kirim">
            </form>
        </div>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>