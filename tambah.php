<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $waktu_kegiatan = $_POST['waktu_kegiatan'];
    $bukti = $_FILES['bukti']['name'];
    $tmp = $_FILES['bukti']['tmp_name'];

    // Validasi upload file
    if ($bukti != "" && is_uploaded_file($tmp)) {
        // Pindahkan file ke folder Bukti
        if (move_uploaded_file($tmp, "Bukti/" . $bukti)) {
            // Simpan ke database
            $query = "INSERT INTO portofolio (nama_kegiatan, waktu_kegiatan, bukti) VALUES ('$nama_kegiatan', '$waktu_kegiatan', '$bukti')";
            mysqli_query($koneksi, $query);
        } else {
            echo "<script>alert('Upload file gagal!');window.location='index.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('File bukti harus diupload!');window.location='index.php';</script>";
        exit;
    }
    header("Location: index.php");
    exit;
}
?>