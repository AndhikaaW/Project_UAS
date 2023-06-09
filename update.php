<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bg.css">
    <link rel="stylesheet" href="css/update.css">
    <style>
        .form-login {
    font-family: verdana;
    width: 100%;
    text-align: center;
    justify-content: center;
    align-items: center;
}
.form-login h2 {
    margin-top: 30px;
    font-weight: bold;
}

.form-login .input-box textarea{
    background: #078a9c;
    border-radius: 10px;
    border: none;
    color: #002c41;
    font-weight: bold;
}

form {
display: flex;
flex-direction: column;
align-items: center;
margin-top: 20px;
}

.btn-kirim {
    width: 100px;
    border-radius: 10px;
    color: #E4E4E4;
    background: #078a9c;
}
    </style>
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

<?php
    include 'koneksi.php';

    if (isset($_GET['judul'])) {
        $judul = $_GET['judul'];

        $query = "SELECT * FROM tbl_lagu WHERE judul='$judul'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $judul = $row['judul'];
            $intro = $row['intro'];
            $reff = $row['reff'];
            $outro = $row['outro'];
        } else {
            echo "Data tidak ditemukan.";
        }
    }


?>
<?php
    require 'koneksi.php';
    if (isset($_POST['update'])) {
        $judul = $_POST['judul'];
        $intro = $_POST['intro'];
        $reff = $_POST['reff'];
        $outro = $_POST['outro'];
    
        $query = "UPDATE tbl_lagu SET intro = '$intro', reff = '$reff', outro = '$outro' WHERE judul = '$judul'";
        $result = mysqli_query($conn, $query);
    
            if ($result) {
                header("location:list_lagu.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
    }
    
    mysqli_close($conn);
?>
    <div class="form-login">
            <form method="POST" action="">
                <input type="hidden" name="judul" value="<?php echo $judul; ?>">
                <h2>Edit Lirik Lagu "<?php echo $judul; ?>"</h2><br><br>
                  

                <div class="input-box">
                    <label><b>Intro</b> </label><br><br>    
                    <textarea name="intro" cols="30" rows="10"><?php echo $intro; ?></textarea><br><br>
                </div>                    
                
                <div class="input-box">
                    <label><b>Reff</b> </label><br><br>
                    <textarea name="reff" cols="30" rows="10"><?php echo $reff; ?></textarea><br><br>
                </div> 

                <div class="input-box">
                    <label><b>Outro</b> </label><br><br>
                    <textarea name="outro" cols="30" rows="10"><?php echo $outro; ?></textarea><br><br>
                </div> 

                <input type="submit" name="update" value="Kirim" class="btn-kirim"><br><br>
            </form>
    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>