<?php
session_start();
include '../connection.php';  // Pastikan file koneksi database sudah terhubung

if (isset($_POST['payment_status']) && $_POST['payment_status'] == 'success') {
    // Ambil data yang dikirimkan melalui POST
    $customer_name = $_POST['customer_name'];  // Nama pelanggan
    $customer_id = $_POST['customer_id'];      // ID pelanggan
    $payment_amount = $_POST['payment_amount']; // Jumlah pembayaran

    // Membuat pesan notifikasi
    $pesan = "Pembelian atas nama $customer_name telah berhasil.";

    // Query untuk memasukkan notifikasi ke dalam database
    $sql = "INSERT INTO notifikasi (id_customer, pesan, status_baca) 
            VALUES ('$customer_id', '$pesan', 0)";  // status_baca 0 berarti belum dibaca

    if (mysqli_query($conn, $sql)) {
        echo "Notifikasi berhasil ditambahkan.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Status pembayaran tidak valid.";
}
?>
