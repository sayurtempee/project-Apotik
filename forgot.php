<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apotek";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$form = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    // Process reset email
    $email = $_POST['email'];
    $stmt = $conn->prepare('SELECT id FROM admin WHERE email=?');
    $stmt->bind_param('s', $email);
    $stmt->execute();  
    $stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();

    if ($id) {
        $_SESSION['reset_id'] = $id;
        $_SESSION['reset'] = 2;
        $message = '<h2 class="text-lg">Reset Your Password</h2>';
        $form = '<form method="post">
                    <div class="mb-4">
                        <label class="block text-[#7a6e5d]">New Password</label>
                        <input class="form-control" type="password" name="password" placeholder="New Password" required />
                    </div>
                    <div class="mb-4">
                        <label class="block text-[#7a6e5d]">Confirm Password</label>
                        <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required />
                    </div>
                    <button class="bg-gradient-to-r from-[#f5deb3] to-[#d2b48c] text-white font-bold py-2 px-4 rounded-full w-full">Update Password</button>
                </form>';
    } else {
        $message = "<script>alert('Email not found');</script>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['reset_id'])) {
    // Process password update
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    if ($password === $confirmpassword) {
        $reset_id = $_SESSION['reset_id'];
        
        $stmt = $conn->prepare('UPDATE admin SET password=? WHERE id=?');
        $stmt->bind_param('si', $password, $reset_id);
        
        if ($stmt->execute()) {
            $message = "<script>alert('Password updated successfully'); window.location.href='login.php';</script>";
        } else {
            $message = "<script>alert('Error updating password: " . $conn->error . "');</script>";
        }
        
        $stmt->close();
    } else {
        $message = "<script>alert('Passwords do not match');</script>";
    }
} else {
    // Display form for email submission
    $message = '<h2 class="text-lg">Forgot Password</h2>';
    $form = '<form method="post">
                <div class="mb-4">
                    <label class="block text-[#7a6e5d]">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="name@example.com" required />
                </div>
                <button class="bg-gradient-to-r from-[#f5deb3] to-[#d2b48c] text-white font-bold py-2 px-4 rounded-full w-full">Send Reset Link</button>
            </form>';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f5f5dc, #f5deb3);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="flex items-center space-x-2">
        <div class="w-80 bg-[#f5f5dc] p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#7a6e5d]">Forgot Password</h2>
            <div class="text-center mb-4">
                <?php echo $message; ?>
            </div>
            <?php echo $form; ?>
            <div class="text-center text-sm text-[#7a6e5d]">
                <a href="regist.php" class="hover:underline">Create an account?</a>
                <span class="mx-2">|</span>
                <a href="login.php" class="hover:underline">Back to Login</a>
            </div>
        </div>
    </div>
</body>
</html>
