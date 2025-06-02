<?php
// Mulai session
session_start();

// Sertakan koneksi database
include '../connection.php';

// Periksa apakah ID produk ada di parameter URL
if (isset($_GET['id'])) {
    // Ambil ID produk
    $productId = $_GET['id'];

    // Query untuk menghapus produk dari database berdasarkan ID
    $deleteQuery = "DELETE FROM obat WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $productId);

    // Jalankan query dan cek apakah penghapusan berhasil
    if ($stmt->execute()) {
        // Redirect ke halaman admin home setelah produk dihapus
        header("Location: homeadmin.php?delete=success");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
