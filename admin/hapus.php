<?php
include "../connection.php"; // Pastikan file koneksi sudah benar

if (isset($_GET['kode'])) {
    // Amankan input untuk mencegah SQL injection
    $kode = mysqli_real_escape_string($conn, $_GET['kode']);
    
    // Buat query DELETE
    $query = "DELETE FROM report WHERE Id = '$kode'";

    // Eksekusi query dan cek hasilnya
    if (mysqli_query($conn, $query)) {
        // Jika berhasil, redirect ke halaman utama dengan pesan
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'tabeladmin.php'; // Ganti dengan nama file utama Anda
        </script>";
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika tidak ada parameter kode, redirect ke halaman utama
    echo "<script>
        alert('Kode tidak ditemukan!');
        window.location.href = 'index.php'; // Ganti dengan nama file utama Anda
    </script>";
}
?>
