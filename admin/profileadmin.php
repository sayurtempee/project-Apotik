<?php
session_start();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotik-home</title>
    <!-- Sertakan Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #faf3e0;
        }

        .container {
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

        .back-button {
            background: none;
            border: none;
            color: black;
            cursor: pointer;
            display: flex;
            align-items: center;
            font-size: 1rem;
            margin-right: 10px;
        }

        .back-button .material-icons {
            margin-right: 5px;
        }

        .data-profile h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .profile-container {
            display: flex; /* Flex container for alignment */
            align-items: center; /* Align items vertically */
            justify-content: center; /* Center items horizontally */
            margin-top: 20px; /* Add space above the boxes */
        }

        .user-box {
            background-color: #E9E9B4;
            padding: 20px;
            margin-left: 20px; /* Add horizontal spacing on the left */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 400px;
            height: 200px;
            margin-top: 30px;
        }

        .user-box p {
            margin: 10px 0;
            font-size: 20px;
        }

        .user-icon-box {
            background-color: #e0e0e0; /* Light gray background */
            width: 200px; /* Set width */
            height: 200px; /* Set height */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 50px;
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <div class="container">
        <header>
            <div class="user-info">
                <span class="material-icons user-icon">person</span>
                <div class="user-text">
                    <span class="user">User</span>
                    <span class="admin">Admin</span>
                </div>
            </div>
    <style>
        /* Logout Section Styling */
        .logout-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
        }

        /* Logout Icon Styling */
        .logout-icon {
            font-size: 24px;
            color: #333;
            line-height: 1; /* Menjaga jarak antar baris agar ikon tetap rata */
        }

        /* Logout Button Styling */
        .logout-button {
            background-color: #ff4d4d; /* Merah cerah untuk menarik perhatian */
            color: white;
            border: none;
            padding: 12px 24px; /* Penambahan padding untuk memberi ruang lebih pada tombol */
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            line-height: 1.5; /* Menambahkan jarak antar baris dalam tombol untuk keterbacaan */
        }

        /* Hover effect for button */
        .logout-button:hover {
            background-color: #ff1a1a;
        }

        /* Remove default styling for anchor */
        .logout-section a {
            text-decoration: none;
        }
    </style>
</head>

    <div class="logout-section">
        <span class="material-icons logout-icon">logout</span>
        <button class="logout-button" onclick="logout()">Log Out</button>
    </div>

    <script>
        // Fungsi logout yang dijalankan saat tombol diklik
        function logout() {
            // Contoh: Menghapus session atau cookie untuk logout
            // sessionStorage.clear();
            // localStorage.clear();

            // Redirect ke halaman logout.php
            window.location.href = '../logout.php';  // Sesuaikan dengan URL logout yang sesuai
        }
    </script>


        </header>

        <h1>PROFILE ADMIN</h1>

        <div class="data-profile">
             <button onclick="window.history.back()" class="back-button">
             <span class="material-icons">arrow_back</span>
                </button>
            </button>
            <h2>DATA PROFILE</h2>
        </div>

        <!-- Profile Container for Alignment -->
        <div class="profile-container">
            <!-- New User Icon Box -->
            <div class="user-icon-box">
                <span class="material-icons" style="font-size: 150px;">person</span>
            </div>

            <div class="user-box">
                <p><strong>Kode Tugas:</strong> <?= $_SESSION['id'] ?></p>
                <p><strong>Username:</strong> <?= $_SESSION['username'] ?></p>
                <p><strong>Email:</strong> <?= $_SESSION['email'] ?></p>
            </div>
        </div>

    </div>

</body>
</html>
