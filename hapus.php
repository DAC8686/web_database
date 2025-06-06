<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get = mysqli_query($koneksi, "SELECT bukti FROM portofolio WHERE id='$id'");
    if (!$get) {
        die("Query error: " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($get);
    if ($data && !empty($data['bukti'])) {
        $file_path = "Bukti/" . $data['bukti'];
        if (file_exists($file_path)) {
            if (!unlink($file_path)) {
                die("Gagal menghapus file: $file_path");
            }
        }
    }
    if (!mysqli_query($koneksi, "DELETE FROM portofolio WHERE id='$id'")) {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    }
}
header("Location: index.php");
exit;
?>