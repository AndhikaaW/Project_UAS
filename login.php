<?php
    include 'koneksi.php';
    $username = $_POST["userName"];
    $password = $_POST["passwd"];
    $query_sql = "SELECT * FROM tbl_user WHERE userName = '$username' AND passwd = '$password'";

    $result = mysqli_query($conn, $query_sql);
    if(mysqli_num_rows($result) > 0){
        header("location:menu.php");
    } else {
        echo "<script language='javascript'>";
        echo "alert('User atau Password tidak sesuai');";
        echo "window.location.href = 'index.html';";
        echo "</script>";
    }
?>