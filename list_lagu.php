<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List lagu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bg.css">
    <link rel="stylesheet" href="css/list_lagu.css">
</head>
<body>
<nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" fixed>
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
    <div class="list">
        <h2><b>Daftar list lagu yang tersedia</b></h2><br><br>
        <table width="500px">
            <?php
                include 'koneksi.php';

                $query = "SELECT * FROM tbl_lagu";
                $result = mysqli_query($conn, $query);
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $judul = $row["judul"];

                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$judul</td>";
                        echo "<td>
                                <form method='POST' action=''>
                                    <input type='hidden' name='judul' value='".$row['judul']."'>
                                    <button type='submit' name='show' class='btnShow'>Lirik</button>
                                </form>
                                <a href='update.php?judul=".$row['judul']."' onclick='return confirmDelete();'>
                                    <button type='button' name='edit' class='btnEdit'>Edit</button>
                                </a>
                               
                                
                                <a href='hapus.php?judul=".$row['judul']."' onclick='return confirmDelete();'>
                                    <button type='button' name='hapus' class='btnHapus'>Hapus</button>
                                </a>
                                </td>";
                        echo "</tr>";
                        $no++ ;
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='4'>Tidak ada data lagu yang tersedia</td>";
                    echo "</tr>";
                }

            ?>
        </table>
    </div>

    <div class="content">
        <h2><b>Lirik Lagu </b></h2>
        <?php
            if (isset($_POST['show'])) {
                $judul = $_POST['judul'];

                $query = "SELECT * FROM tbl_lagu WHERE judul='$judul'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<h2>" . $row['judul'] . "</h2>";
                        echo "<table width='340px'>";
                        echo "<tr>
                                <td><p> <b>Intro</b> <br>" . $row['intro'] . "</p></td>
                            </tr>
                            <tr>
                                <td><p><b>Reff</b> <br>" . $row['reff'] . "</p></td>
                            </tr>
                            <tr>
                                <td><p><b>Outro</b> <br>" . $row['outro'] . "</p></td>
                            </tr>";
                        echo "</table>";
                    }
                } else {
                    echo "Data tidak ditemukan.";
                }
                exit();
            }
            
            mysqli_close($conn);
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
