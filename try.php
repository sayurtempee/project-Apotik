<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cure & Care - Nota Pengambilan Obat</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f0db; /* Match the background color */
        }

        .nota-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
            font-family: 'Roboto', sans-serif;
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .nota-container:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="50" fill="%23f0f0db" opacity="0.1"/></svg>') repeat;
            z-index: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .item-summary {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #ddd;
        }

        .total-amount {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .pickup-info {
            margin-top: 20px;
            font-size: 14px;
        }

        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: gray;
            margin-top: 20px;
        }
    </style>
</head>

<body>
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
        <a href="./detail-pembayaran.php"><i class="fas fa-arrow-left text-2xl"> Back</i></a>
    </div>

    <main class="p-4">
        <section class="nota-container">
            <div class="header">
                <h1>Cure & Care</h1>
                <p>Jl. Contoh No. 123, Kota Contoh</p>
                <p>Tel: (123) 456-7890</p>
                <p>--- Nota Pembelian ---</p>
            </div>

            <div class="payment-summary" id="payment-items"></div>
            <div class="total-amount" id="total-amount">Total: Rp. 0</div>

            <div class="pickup-info">
                <h4>Informasi Pengambilan</h4>
                <p><strong>Kode Pesanan:</strong> ABC123</p>
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
        const cart = [
            { name: 'INSTO', price: 23.906, quantity: 2 },
            { name: 'Paracetamol', price: 5.000, quantity: 1 },
            { name: 'Vitamin C', price: 10.000, quantity: 3 }
        ];

        function renderPayment() {
            const paymentItemsContainer = document.getElementById('payment-items');
            paymentItemsContainer.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
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
        }

        // Initial render
        renderPayment();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
