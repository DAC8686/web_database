<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "portofolio_db";

    $koneksi = mysqli_connect($host, $user, $password, $database);
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>