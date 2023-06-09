<?php
$conn = new mysqli("localhost", "root", "", "project_uas");
if($conn->connect_error) {
    die("Koneksi ke database Gagal: " . $conn->connect_error);
}
?>