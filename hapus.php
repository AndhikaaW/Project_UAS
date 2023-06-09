<?php
include("koneksi.php");
if (isset($_GET["judul"])){
    $judul = $_GET["judul"];

    $query = "DELETE FROM tbl_lagu WHERE judul = '$judul'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($conn). " - ".mysqli_error($conn));
    }
}

header("location:list_lagu.php");
?>