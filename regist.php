<?php
// Include database connection
session_start();
include 'connection.php'; // Adjust the path as necessary

// Handle registration form submission
if (isset($_POST['register'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    // Check if the email already exists
    $checkEmail = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.')</script>";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO admin (username, email, password, level) VALUES ('$username', '$email', '$password', 'user')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f5f5dc, #f5deb3);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen relative">
    <a href="home.php" class="absolute top-4 left-4 text-[#7a6e5d] hover:underline">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <div class="flex items-center space-x-2">
        <div>
            
        </div>
        <div class="w-80 bg-[#f5f5dc] p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#7a6e5d]">REGISTER</h2>
            <form method="post">
                <div class="mb-4">
                    <label class="block text-[#7a6e5d]">Username</label>
                    <div class="flex items-center border-b border-[#7a6e5d] py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="username" placeholder="Username" required />
                        <i class="fas fa-user text-[#7a6e5d]"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-[#7a6e5d]">Email</label>
                    <div class="flex items-center border-b border-[#7a6e5d] py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] mr-3 py-1 px-2 leading-tight focus:outline-none" type="email" name="email" placeholder="Email" required />
                        <i class="fas fa-envelope text-[#7a6e5d]"></i>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-[#7a6e5d]">Password</label>
                    <div class="flex items-center border-b border-[#7a6e5d] py-2">
                        <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" name="password" placeholder="Password" required />
                        <i class="fas fa-eye-slash text-[#7a6e5d]"></i>
                    </div>
                </div>
                <div class="flex items-center justify-center mb-2">
                    <button class="bg-gradient-to-r from-[#f5deb3] to-[#d2b48c] text-white font-bold py-3 px-6 rounded-full w-full text-lg" type="submit" name="register">Register</button>
                </div>
            </form>
            <div class="flex justify-between text-sm text-[#7a6e5d]">
                <a href="login.php" class="hover:underline">Sign In?</a>
                <a href="forgot.php" class="hover:underline">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>

</html>
