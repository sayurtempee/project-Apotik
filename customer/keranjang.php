<?php 
session_start();

include '../connection.php';

$getObat = mysqli_query($conn, "SELECT 
    k.*,
    ki.*, 
    u.*, 
    k.id AS keranjang_id,
    u.id AS data_user_id, 
    ki.id AS keranjang_item_id,
    ki.quantitiy AS quantity_data,
    o.id AS data_obat_id,
    o.merek,
    o.harga,
    o.gambar
FROM 
    keranjang k 
JOIN 
    keranjang_items ki ON k.id = ki.keranjang_id 
JOIN 
    admin u ON k.user_id = u.id 
JOIN
    obat o ON ki.obat_id = o.id
LEFT JOIN 
    transaksi t ON k.id = t.keranjang_id
WHERE 
    t.keranjang_id IS NULL
    AND u.id = ". $_SESSION['id']);

while ($row = mysqli_fetch_assoc($getObat)) {
    $daftar_obat[] = $row;
}


if(!isset($daftar_obat)) {
    header("Location: dashboard.php");
    exit();
}

$cartData;

// print_r($daftar_obat); die;

$jsArray = array_map(function ($item) {
    return [
        'id' => $item['obat_id'],
        'name' => $item['merek'],
        'price' => $item['harga'],
        'quantity' => $item['quantity_data'],
        'img' => '../img/' . $item['gambar']
    ];
}, $daftar_obat);

// $jsArray['keranjang_id'] = $daftar_obat[0]['id'];


// print_r($jsArray);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cure & Care</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body { background-color: #f0f0db; } /* Set background color here */
        .user-header { display: flex; justify-content: space-between; align-items: center; background-color: rgba(0, 0, 0, 0.15); padding: 10px 20px; }
        .cart-item { margin-bottom: 20px; }
        .item { display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #f0f0db; border-radius: 8px; }
        .item-image { width: 100px; }
        .item-details { display: flex; flex-direction: column; margin-left: 10px; flex-grow: 1; }
        .quantity-btn { background-color: #d9534f; border: none; color: white; padding: 4px 8px; margin: 0 5px; border-radius: 4px; cursor: pointer; }
        .total-price { text-align: right; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .custom-checkbox { width: 30px; height: 30px; border: 2px solid #ccc; background-color: white; border-radius: 5px; position: relative; margin-right: 15px; transition: background-color 0.3s, border-color 0.3s; cursor: pointer; }
        .checkbox { display: none; }
        .checkbox:checked + .custom-checkbox { background-color: #4caf50; border-color: #4caf50; }
        .checkbox:checked + .custom-checkbox::after { content: ''; position: absolute; top: 9px; left: 12px; width: 6px; height: 12px; border: solid white; border-width: 0 3px 3px 0; transform: rotate(45deg); }
        .custom-checkbox:hover { border-color: #4caf50; background-color: #e0f7e0; }
        .checkbox-label { display: flex; align-items: center; margin-bottom: 20px; }
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
        <a href="./dashboard.php"><i class="fas fa-arrow-left text-2xl"> Back</i></a>
    </div>

    <main class="p-4">
        <section>
            <h2 class="text-xl font-bold flex items-center mb-4">
                <i class="fas fa-shopping-bag mr-2"></i>
                Keranjang Obat
            </h2>
            <hr class="border-t border-black mb-4" />
            <div id="cart-items"></div>
            <div class="total-price" id="selected-total-price">Total: Rp. 0</div>
            <button class="btn btn-success btn-lg" onclick="proceedToPayment()">Lanjutkan Pembayaran</button>
        </section>
    </main>

    <script>
        let cart = <?= json_encode($jsArray, JSON_UNESCAPED_SLASHES) ?>;

        function renderCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            let total = 0;

            cart.forEach((item, index) => {
                total += item.price * item.quantity;
                cartItemsContainer.innerHTML += `
                    <div class="cart-item">
                        <div class="item">
                            <label class="checkbox-label">
                                <input type="checkbox" class="checkbox" id="item-${index}" onchange="updateSelection()">
                                <span class="custom-checkbox"></span>
                            </label>
                            <img src="${item.img}" alt="${item.name}" class="item-image">
                            <div class="item-details">
                                <span class="item-name">${item.name}</span>
                                <div class="item-quantity">
                                    <button class="quantity-btn" onclick="changeQuantity(${index}, -1)">-</button>
                                    <span>${item.quantity}</span>
                                    <button class="quantity-btn" onclick="changeQuantity(${index}, 1)">+</button>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold">Rp. ${item.price.toLocaleString()}/strip</p>
                                <button class="text-red-500 mt-2" onclick="removeItem(${index})"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('selected-total-price').innerText = `Total: Rp. ${total.toLocaleString()}`;
        }

        function changeQuantity(index, change) {
            cart[index].quantity = Math.max(1, cart[index].quantity + change); // Prevent less than 1
            renderCart();
        }

        function removeItem(index) {
            cart.splice(index, 1);
            renderCart();
        }

        function updateSelection() {
            const checkboxes = document.querySelectorAll('.checkbox');
            let selectedItems = [];
            let selectedTotal = 0;

            checkboxes.forEach((checkbox, index) => {
                if (checkbox.checked) {
                    selectedItems.push(cart[index]);
                    selectedTotal += cart[index].price * cart[index].quantity;
                }
            });

            localStorage.setItem('selectedCartItems', JSON.stringify(selectedItems));
            document.getElementById('selected-total-price').innerText = `Total: Rp. ${selectedTotal.toLocaleString()}`;
        }

        function proceedToPayment() {
            const checkboxes = document.querySelectorAll('.checkbox');
            let anySelected = Array.from(checkboxes).some(checkbox => checkbox.checked);

            if (!anySelected) {
                alert("Silakan pilih produk sebelum melanjutkan pembayaran.");
            } else {
                <?php $jsArray['keranjang_id'] = $daftar_obat[0]['keranjang_id']; $_SESSION['cart'] = $jsArray ?>
                window.location.href = './detailpembayaran.php';
            }
        }

        // Initial render
        renderCart();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
