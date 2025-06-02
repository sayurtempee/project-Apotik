<?php
session_start();
include '../connection.php';

if (isset($_GET['id_notifikasi'])) {
    $id_notifikasi = $_GET['id_notifikasi'];

    // Update status_baca menjadi 1 (dibaca)
    $sql = "UPDATE notifikasi SET status_baca = 1 WHERE id_notifikasi = '$id_notifikasi'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href = 'notifadmin.php';</script>";  // Redirect kembali ke halaman notifikasi admin
    } else {
        echo "<script>alert('Terjadi kesalahan saat menandai notifikasi.'); window.location.href = 'notifadmin.php';</script>";
    }
}
?>
