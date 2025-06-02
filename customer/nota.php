<?php
session_start();

include '../connection.php';


$getAllItems = mysqli_query($conn, "SELECT 
    transaksi.id_transaksi,
    transaksi.tgl_transaksi,
    transaksi.jml_transaksi,
    keranjang.*
FROM 
    transaksi
JOIN 
    keranjang ON transaksi.keranjang_id = keranjang.id
WHERE 
    transaksi.id_transaksi = " . $_GET['id']);
    

    $nota = mysqli_fetch_assoc($getAllItems);

// print_r($nota); die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cure & Care - Nota Pengambilan Obat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0db;
            font-family: 'Courier New', Courier, monospace; /* Monospaced font for receipt */
        }

        .nota-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .item-summary {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px dashed #ddd;
        }

        .item-summary:last-child {
            border-bottom: none;
        }

        .total-amount {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        .pickup-info {
            margin-top: 20px;
            font-size: 12px;
        }

        .order-date {
            font-size: 12px;
            margin: 10px 0;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: 20px;
        }

        .back-button a {
            border-radius: 20px;
            padding: 10px 70px;
            background-color: #007bff; /* Primary color */
            color: white;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-button a:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>

<body>
    <main class="p-4">
        <section class="nota-container">
            <div class="header">
                <h1>Cure & Care</h1>
                <p>Jl. Contoh No. 123, Kota Contoh</p>
                <p>Tel: (123) 456-7890</p>
                <hr>
                <p>--- Nota Pembelian ---</p>
            </div>

            <div class="order-date" id="order-date"><?= date("d/m/y h:i:s A", strtotime($nota['tgl_transaksi'])) ?></div> <!-- New section for date and time -->

            <div class="payment-summary" id="payment-items"></div>
            <div class="total-amount" id="total-amount">Total: Rp. 0</div>

            <div class="pickup-info">
                <h4>Informasi Pengambilan</h4>
                <p><strong>Kode Pesanan:</strong> <?= $nota['id_transaksi'] ?></p>
                <p><strong>Pembayaran:</strong> Tunai (Diterima saat pengambilan)</p>
                <p><strong>Jam Operasional:</strong> Senin - Minggu, 08:00 - 20:00</p>
            </div>

            <div class="back-button">
                <a href="./keranjang.php" class="btn btn-primary">Kembali ke Keranjang</a>
            </div>
        </section>

        <div class="footer">
            <p>Terima kasih telah berbelanja!</p>
            <p>--- Harap simpan struk ini ---</p>
        </div>
    </main>

    <script>
        function renderPayment() {
            const paymentItemsContainer = document.getElementById('payment-items');
            paymentItemsContainer.innerHTML = '';
            let total = 0;

            const selectedItems = JSON.parse(localStorage.getItem('selectedCartItems')) || [];

            selectedItems.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                paymentItemsContainer.innerHTML += `
                    <div class="item-summary">
                        <span>${item.name} (x${item.quantity})</span>
                        <span>Rp. ${itemTotal.toFixed(3)}</span>
                    </div>
                `;
            });

            document.getElementById('total-amount').innerText = `Total: Rp. ${total.toFixed(3)}`;
            // document.getElementById('order-date').innerText = `Tanggal Pemesanan: ${new Date().toLocaleString()}`; // Display current date and time
        }

        // Initial render
        renderPayment();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
