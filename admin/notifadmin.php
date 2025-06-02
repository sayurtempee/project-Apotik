<?php
session_start();
include '../connection.php';

// Query untuk mengambil notifikasi yang belum dibaca
$sql = "SELECT * FROM notifikasi WHERE status_baca = 0 ORDER BY tgl_notifikasi DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    }
} else {
    echo "Tidak ada notifikasi baru.";
}
?>


<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F7F6D9;
        }
    </style>
</head>
<body class="p-4">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <i class="fas fa-user text-blue-500 text-2xl"></i>
            <span class="ml-2">User Admin</span>
        </div>
        <div class="flex items-center space-x-4">
            <i class="fas fa-bell text-orange-500 text-2xl"></i>
            <i class="fas fa-plus-circle text-black text-2xl"></i>
        </div>
    </div>
    <div class="text-center mb-4">
        <h1 class="text-3xl font-bold">CURE & CARE</h1>
    </div>
    <div>
        <h2 class="text-xl font-bold mb-2">Notifikasi</h2>
        <hr class="border-t-2 border-black mb-4">
        <div class="space-y-4">
            <?php
            // Memeriksa jika session belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
            include '../connection.php';

            // Ambil semua notifikasi yang belum dibaca
            $sql = "SELECT * FROM notifikasi WHERE status_baca = 0 ORDER BY tgl_notifikasi DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="flex items-center bg-[#e9e7a0] p-4 rounded">';
                    echo '<i class="fas fa-bell text-yellow-500 text-2xl"></i>';
                    echo '<span class="ml-4">' . $row['pesan'] . '</span>';
                    echo '<small class="ml-4 text-sm text-gray-500">' . $row['tgl_notifikasi'] . '</small>';
                    echo '<a href="mark_as_read.php?id_notifikasi=' . $row['id_notifikasi'] . '" class="ml-4 text-blue-500">Mark as Read</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>Tidak ada notifikasi baru.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
