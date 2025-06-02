
<?php
// Koneksi ke database
$host = 'localhost';
$db = 'apotek';
$user = 'root'; // Ganti sesuai dengan username database Anda
$pass = ''; // Ganti sesuai dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Menangani operasi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    // Tambah item
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message']);
    
    if (!empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO contact (email, message) VALUES (?, ?)");
        $stmt->execute([$email, $message]);
        echo "Message sent successfully!";
    } else {
        echo "Email and message cannot be empty.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    // Hapus item
    $id = filter_var($_GET['delete'], FILTER_VALIDATE_INT);
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM contact WHERE id = ?");
        $stmt->execute([$id]);
        echo "Message deleted successfully!";
    } else {
        echo "Invalid ID.";
    }
}

// Ambil semua item
$stmt = $pdo->query("SELECT * FROM contact");
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us - Apotek Cure and Care</title>
   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- icon bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="./css/style.css">
   <style>
      header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 20px;
         background-color: #fff;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .container {
         width: 100%;
         margin: 10px auto;
         overflow: hidden;
         justify-content: space-between;
         animation: fadeIn 2s ease-out;
         color: #000;
      }

      .logo-container {
         display: flex;
         align-items: center;
      }

      .logo {
         width: 50px;
         /* Adjust logo size */
         height: auto;
         margin-right: 10px;
      }

      .text h1 {
         margin: 0;
         font-size: 24px;
         font-weight: bold;
      }

      .text p {
         margin: 0;
         font-size: 14px;
         color: #555;
      }

      nav ul {
         display: flex;
         list-style: none;
      }

      nav ul li {
         margin: 0 15px;
      }

      nav ul li a {
         text-decoration: none;
         color: #333;
         font-size: 16px;
      }

      nav ul li a:hover {
         text-decoration: none;
         color: #FF9A62;
         font-size: 16px;
         position: relative;
      }

      nav ul li a:hover::after {
         content: '';
         position: absolute;
         left: 0;
         bottom: -2px;
         /* Jarak garis dari teks */
         width: 100%;
         height: 2px;
         /* Ketebalan garis */
         background-color: #FF9A62;
         /* Warna garis */
      }

      .search input {
         padding: 8px;
         border-radius: 5px;
         border: 1px solid #ddd;
      }

      .search button {
         background-color: transparent;
         border: none;
         cursor: pointer;
      }

      main {
         padding: 40px;
         text-align: center;
      }

      .contact-us {
         display: flex;
         justify-content: space-between;
         align-items: flex-start;
         gap: 50px;
      }

      .contact-form {
         width: 50%;
      }

      .contact-form h1 {
         font-size: 36px;
         margin-bottom: 20px;
      }

      .contact-form p {
         font-size: 16px;
         margin-bottom: 30px;
      }

      .contact-form label {
         display: block;
         font-weight: bold;
         margin-bottom: 10px;
         font-size: 16px;
      }

      .contact-form input,
      .contact-form textarea {
         width: 100%;
         padding: 10px;
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .contact-form textarea {
         height: 100px;
         resize: none;
      }

      .contact-form button {
         padding: 10px 20px;
         background-color: #f7941d;
         color: white;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .contact-form button:hover {
         background-color: #e6830b;
      }

      .contact-info {
         width: 35%;
      }

      .contact-info h2 {
         font-size: 28px;
         margin-bottom: 20px;
      }

      .contact-info p {
         font-size: 18px;
         line-height: 1.6;
         margin-bottom: 20px;
      }

      .contact-info i {
         display: block;
         margin-bottom: 5px;
      }

      address {
         font-style: normal;
         font-size: 16px;
         color: #666;
      }

      .open-modal-btn {
         padding: 10px 20px;
         background-color: #CCC4AC;
         color: #000;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         font-size: 16px;
      }

      .open-modal-btn:hover {
         background-color: #A39C89;
      }

      /* Modal */
      .modal {
         display: none;
         position: fixed;
         z-index: 1;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.5);
         justify-content: center;
         align-items: center;
      }

      .modal-content {
         background-color: #fff5d7;
         padding: 20px;
         border-radius: 10px;
         width: 500px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
         position: relative;
      }

      .close {
         position: absolute;
         top: 10px;
         right: 10px;
         font-size: 20px;
         cursor: pointer;
      }

      h2 {
         text-align: center;
         margin-bottom: 20px;
      }

      .form-group {
         margin-bottom: 15px;
      }

      label {
         font-size: 14px;
         margin-bottom: 5px;
         display: block;
      }

      input {
         width: 100%;
         padding: 8px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .submit-btn {
         width: 100%;
         padding: 10px;
         background-color: #FF9A62;
         color: #000;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .submit-btn:hover {
         background-color: #CC7B4E;
      }
   </style>
</head>

<body>
   <header>
      <div class="logo-container">
         <img src="./img/logo.png" alt="ACC Logo" class="logo">
         <div class="text">
            <h1>ACC</h1>
            <p>Apotik Cure and Care</p>
         </div>
      </div>
      <nav>
         <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="sediaan.php">Sediaan</a></li>
            <li><a href="contact.php">Contact</a></li>
         </ul>
      </nav>
      <div class="search">
         <input type="text" placeholder="Cari Kebutuhanmu......🔍">
      </div>
      <div>
    <button id="openModalBtn" class="open-modal-btn" onclick="location.href='login.php'">Login</button>
      </div>
      </div>
   </header>

   <div class="container">
      <main>
         <section class="contact-us">
            <div class="contact-form">
               <h1>Contact us</h1>
               <p>Bila ada keluhan atau permasalah dari web kami, silahkan hubungi pihak kami</p>
               <form action="#" method="POST">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="message">Your Message</label>
    <textarea id="message" name="message" placeholder="Enter your message" required></textarea>

    <button type="submit" name="add">SEND</button>
</form>

            </div>

            <div class="contact-info">
               <h2>Hubungi kami</h2>
               <p>
                  <i class="bi bi-instagram"> @apotekacc</i> <br>
                  <i class="bi bi-facebook"> @apotekacc</i> <br>
                  <i class="bi bi-envelope-open-heart"> apotekacc@gmail.com</i> <br>
                  <i class="bi bi-telephone-inbound"> +62-8571-623-119</i> <br>
               </p>
               <address>
                  <i class="bi bi-geo-alt-fill"></i>
                  Jl. Dr. KRT Radjiman Widyodiningrat,<br>
                  Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta
               </address>
            </div>
         </section>
      </main>
   </div>

</body>

</html>