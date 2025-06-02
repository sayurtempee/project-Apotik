<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotik-pickup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Style reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #faf3e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            min-height: calc(100vh - 80px);
            padding-bottom: 80px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-icon {
            font-size: 36px;
            margin-right: 10px;
        }

        .user-text {
            display: flex;
            flex-direction: column;
        }

        .user-text .user {
            color: orange;
            font-weight: bold;
        }

        .user-text .admin {
            color: black;
        }

        .logout-section {
            display: flex;
            align-items: center;
        }

        .logout-icon {
            font-size: 36px;
            color: black;
            margin-right: 10px;
            cursor: pointer;
        }

        .logout-button {
            background-color: white;
            color: red;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 50px;
            font-weight: bold;
        }

        .data-profile {
            background-color: #E9E9B4;
            width: 100%;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            background-color: #e0e0e0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            margin-top: 20px;
            font-weight: bold;
        }

        .order-box {
            background-color: white;
            padding: 15px;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            align-items: center;
        }

        .status-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <div class="user-info">
                <i class="fas fa-user user-icon"></i>
                <div class="user-text">
                    <span class="user">User</span>
                    <span class="admin">Admin</span>
                </div>
            </div>
            <div class="logout-section">
                <i class="fas fa-sign-out-alt logout-icon" onclick="location.href='../logout.php'"></i>
                <button class="logout-button" onclick="location.href='../logout.php'">Log Out</button>
            </div>
        </header>

        <h1 class="text-3xl font-bold mb-4">PICK UP</h1>

        <div class="data-profile">
            <button class="back-button">
                <a href="informasiadmin.php"><i class="fas fa-arrow-left text-2xl"> Back</i></a>
            </button>
        </div>

        <div class="order-header">
            <span>No Pesanan</span>
            <span>Username</span>
            <span>Waktu</span>
        </div>

        <!-- Order item with unique ID -->
        <?php
        include "../connection.php";

        // Query untuk mengambil data pesanan yang belum dihapus
        $query = "SELECT * FROM pickup ORDER BY no_pesanan DESC"; // Urutkan berdasarkan no_pesanan
        $result = mysqli_query($conn, $query);

        // Mengecek apakah ada data pesanan
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $no_pesanan = $row['no_pesanan'];
                $username = $row['username'];
                $waktu = $row['waktu'];
                echo '
        <div class="order-box" id="order-' . $no_pesanan . '">
            <div><strong>' . $no_pesanan . '</strong></div>
            <div><strong>' . $username . '</strong></div>
            <div><strong>Pukul: ' . $waktu . '</strong></div>
            <div class="status-buttons">
                <a href="delete-pickup.php?no_pesanan=' . $no_pesanan . '" onclick="return confirmDelete(' . $no_pesanan . ')">
                    <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-700" style="width: 100px;">SUDAH</button>
                </a>
            </div>
        </div>';
            }
        } else {
            echo "<p>Tidak ada pesanan untuk ditampilkan.</p>";
        }
        ?>

    </div>

    </div>

    <script>
        function confirmDelete(orderId) {
            // Konfirmasi penghapusan
            if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
                // Hapus elemen pesanan dari tampilan jika user setuju
                var orderElement = document.getElementById('order-' + orderId);
                if (orderElement) {
                    orderElement.remove();
                }
                return true; // Lanjutkan ke link untuk menghapus dari database
            } else {
                return false; // Batalkan penghapusan
            }
        }
    </script>


    </div>

</body>

</html>