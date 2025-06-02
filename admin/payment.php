<?php

session_start();

include '../connection.php';

$getAllTransactionItems = mysqli_query($conn, "SELECT 
    transaksi.id_transaksi,
    transaksi.tgl_transaksi,
    keranjang.id AS keranjang_id,
    keranjang_items.id AS keranjang_item_id,
    keranjang_items.quantitiy,
    keranjang.total_harga,
    obat.id AS obat_id,
    keranjang.user_id,
    admin.id AS user_id,
    admin.username,
    obat.merek,
    obat.stok_obat,
    obat.tanggal_produksi,
    obat.tanggal_eks,
    obat.komposisi,
    obat.harga,
    obat.gambar AS obat_gambar
FROM 
    transaksi
JOIN 
    keranjang ON transaksi.keranjang_id = keranjang.id
JOIN 
    keranjang_items ON keranjang.id = keranjang_items.keranjang_id
JOIN 
    obat ON keranjang_items.obat_id = obat.id
JOIN
    admin ON keranjang.user_id = admin.id
");

while($row = mysqli_fetch_assoc($getAllTransactionItems))
$obat[] = $row;
// print_r($obat);die;
?>


<html>

<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- icon bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5dc;
        }
        .bottom-icons {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            background-color: black;
            padding: 10px 20px;
            border-radius: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .bottom-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 15px;
            color: #333;
            cursor: pointer;
        }

        .bottom-icon .material-icons {
            font-size: 24px;
            color: orange;
        }

        .bottom-icon .icon-text {
            font-size: 0.8rem;
            margin-top: 5px;
            color: orange;
        }

        .bottom-icon:nth-child(1) .material-icons,
        .bottom-icon:nth-child(3) .material-icons {
            color: white;
        }

        .bottom-icon:nth-child(1) .icon-text,
        .bottom-icon:nth-child(3) .icon-text {
            color: white;
        }
    </style>
</head>

<body class="p-6">
    <div class="flex items-center mb-6">
        <div class="flex items-center">
            <i class="fas fa-user-circle text-blue-500 text-2xl"></i>
            <span class="ml-2 text-sm">User<br><span class="font-bold">Admin</span></span>
        </div>
    </div>
    <h1 class="text-center text-3xl font-bold mb-6">Laporan Payment</h1>
    <div class="mb-4">
        <span class="italic">LAPORAN PENGELUARAN</span>
    </div>
    <div class="border-t border-black mb-4"></div>
    <div class="space-y-4">
        <div class="border-b border-black pb-4">
            <div class="grid grid-cols-6 gap-4 mb-2">
                <div class="font-bold">Product</div>
                <div class="font-bold">Username</div>
                <div class="font-bold">Description</div>
                <div class="font-bold">Available</div>
                <div class="font-bold">Unit Price</div>
                <div class="font-bold">Jumlah di Beli</div>
                <div class="font-bold">Total Harga</div>
            </div>
            <?php foreach($obat as $o): ?>
            <div class="grid grid-cols-6 gap-4 items-center">
                <img src="../img/<?= $o['obat_gambar'] ?>" alt="Product image of Bodrexin Demam" class="w-12 h-12">
                <div><?= $o['username'] ?></div>
                <div><?= $o['merek'] ?></div>
                <div>-</div>
                <div><?= $o['harga'] ?></div>
                <div>5</div>
                <div><?=  $o['total_harga'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="bottom-icons">
    <div class="bottom-icon" onclick="window.location.href='homeadmin.php'">
        <span class="material-icons">home</span>
        <div class="icon-text">Home</div>
    </div>
    <div class="bottom-icon" onclick="window.location.href='payment.php'">
        <span class="material-icons">payment</span>
        <div class="icon-text">Payment</div>
    </div>
    <div class="bottom-icon" onclick="window.location.href='form_report.php'">
        <span class="material-icons">report</span>
        <div class="icon-text">Report</div>
    </div>
</div>
</body>
</html>