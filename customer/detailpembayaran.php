<?php 
session_start();

date_default_timezone_set("Asia/Jakarta");

include '../connection.php';

if(!isset($_SESSION['cart'])) {
    header("Location: keranjang.php");
}

// Initialize the total price
$totalPrice = 0;

$cart = $_SESSION['cart'];
$tglTransaksi = date("Y-m-d h:i:s");

function generateRandomNumber(int $length = 10): string {
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Calculate the total price
foreach ($cart as $item) {
    if (isset($item['price']) && isset($item['quantity'])) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}

// Update the total price in the cart table
mysqli_query($conn, "UPDATE keranjang SET total_harga = $totalPrice WHERE id = ". $cart['keranjang_id']);

if(isset($_POST['buat_pesanan'])) {
    $idTransaksi = generateRandomNumber();
    $keranjangId = $cart['keranjang_id'];

    // Insert into the transaksi table
    if(mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, tgl_transaksi, keranjang_id, jml_transaksi) VALUES ('$idTransaksi', '$tglTransaksi', $keranjangId, '$totalPrice')")) {
        unset($cart['keranjang_id']);
        
        // Update stock and loop through each item
        foreach ($cart as $item) {
            mysqli_query($conn, "UPDATE obat SET stok_obat = stok_obat - ".$item['quantity']." WHERE id = ". $item['id']);
        }

        // Add notification to the database
        $customer_name = "Nama Pelanggan";  // Replace this with actual customer data
        $customer_id = 1;  // Replace with actual customer ID
        $pesan = "Pembelian atas nama $customer_name SUKSES. Transaksi ID: $idTransaksi";

        $sql = "INSERT INTO notifikasi (id_customer, pesan, status_baca) VALUES ('$customer_id', '$pesan', 0)";  // status_baca 0 means unread
        if (mysqli_query($conn, $sql)) {
            echo "Notifikasi berhasil ditambahkan.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Redirect to the receipt page
        header("Location: nota.php?id=$idTransaksi");
        exit();
    }

    echo "ERROR";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cure & Care - Konfirmasi Pembayaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body { background-color: #f0f0db; }
        .user-header { display: flex; justify-content: space-between; align-items: center; background-color: rgba(0, 0, 0, 0.15); padding: 10px 20px; }
        .payment-summary { margin-top: 20px; }
        .item-summary { display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #fff; border-radius: 8px; margin-bottom: 10px; }
        .total-amount { text-align: right; font-size: 18px; font-weight: bold; margin-top: 20px; }
        .confirm-button { margin-top: 20px; }
        .pickup-info { margin-top: 20px; background-color: #fff; padding: 15px; border-radius: 8px; }
    </style>
</head>

<body>
<form method="POST">
        <?php
        // Simulate selected items as PHP array (this can be retrieved from session or any other source)
        $selectedItems = [
            ['name' => 'Item A', 'quantity' => 2, 'price' => 10000],
            ['name' => 'Item B', 'quantity' => 1, 'price' => 20000],
        ];

        foreach ($selectedItems as $index => $item) {
            echo '<input type="hidden" name="items[' . $index . '][name]" value="' . $item['name'] . '">';
            echo '<input type="hidden" name="items[' . $index . '][quantity]" value="' . $item['quantity'] . '">';
            echo '<input type="hidden" name="items[' . $index . '][price]" value="' . $item['price'] . '">';
        }
        ?>
    <header class="user-header">
        <div class="user-info">
            <i class="bi bi-person-circle" style="font-size: 40px; margin-left:10px; margin-right:20px;"></i>
            <div class="user-text">
                <span class="user-name">User</span>
                <span class="user-role">Customer</span>
            </div>
        </div>
        <div class="user-actions">
            <button class="action-btn">
                <a href="./notifikasi.php"><i class="bi bi-bell"></i></a>
            </button>
            <button class="action-btn">
                <a href="./keranjang.php"><i class="bi bi-cart"></i></a>
            </button>
        </div>
    </header>

    <div class="flex justify-between items-center p-4">
        <a href="./keranjang.php"><i class="fas fa-arrow-left text-2xl"> Back</i></a>
    </div>

    <form action="">
    <main class="p-4">
        <section>
            <h2 class="text-xl font-bold flex items-center mb-4">
                <i class="fas fa-shopping-cart mr-2"></i>
                Konfirmasi Pembayaran
            </h2>
            <hr class="border-t border-black mb-4" />
            <div class="payment-summary" id="payment-items"></div>
            <div class="total-amount" id="total-amount">Total: Rp. 0</div>


            <div class="pickup-info">
                <h3 class="font-bold">Informasi Pengambilan</h3>
                <p name="order_code"><strong>Tanggal & Waktu Pemesanan:</strong> <?= date('l, j F Y H:i', strtotime($tglTransaksi)) ?></p>
                <p>Silakan ambil pesanan Anda di lokasi apotek:</p>
                <p name="shop_name"><strong>Nama Apotek:</strong> Cure & Care</p>
                <p name="address"><strong>Alamat:</strong> Jl. Contoh No. 123, Kota Contoh</p>
                <p name="order_datetime"><strong>Jam Operasional:</strong> Senin - Minggu, 08:00 - 20:00</p>
                <p name="code_shop"><strong>Kode Pesanan:</strong> ABC123</p>
                <p name="payment_method"><strong>Pembayaran:</strong> Tunai (Diterima saat pengambilan)</p>
            </div>

            <div class="confirm-button">
                <button type="submit" name="buat_pesanan" class="btn btn-success btn-lg">Konfirmasi Pembayaran</button>
            </div>
        </section>
    </main>
    </form>

    <script>
        function renderPayment() {
            const paymentItemsContainer = document.getElementById('payment-items');
            paymentItemsContainer.innerHTML = '';
            let total = 0;

            const selectedItems = JSON.parse(localStorage.getItem('selectedCartItems')) || []; // Get selected items from local storage

            selectedItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                paymentItemsContainer.innerHTML += 
                    `<div class="item-summary">
                        <span>${item.name} (x${item.quantity})</span>
                        <span>Rp. ${itemTotal.toFixed(3)}</span>
                    </div>`;
            });

            document.getElementById('total-amount').innerText = `Total: Rp. ${total.toFixed(3)}`;
        }

        // Initial render
        renderPayment();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
