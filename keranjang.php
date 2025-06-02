<?php
// Koneksi ke database
$host = 'localhost';
$db = 'apotek';
$user = 'root'; // Ganti sesuai dengan username database Anda
$pass = ''; // Ganti sesuai dengan password database Anda

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Menangani operasi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Tambah item
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $stmt = $pdo->prepare("INSERT INTO keranjang (name, price, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $quantity]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    // Hapus item
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM keranjang WHERE id = ?");
    $stmt->execute([$id]);
}

// Ambil semua item
$stmt = $pdo->query("SELECT * FROM keranjang");
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cure & Care - Keranjang Obat</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
         filter: opacity(50%);
      }

      .hero {
         display: flex;
         justify-content: space-between;
         align-items: center;
         /* background: linear-gradient(to right, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.5)), url('your-image'); */
         padding: 50px;
         /* background-color: rgba(0, 0, 0, 0.5); */
      }

      .hero-content {
         max-width: 50%;
      }

      .hero-content h1 {
         font-size: 2.5em;
         color: #333;
         margin-bottom: 20px;
      }

      .hero-content p {
         font-size: 1.2em;
         color: #777;
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
   </style>
</head>

<body>
   <!-- Navbar -->
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
   </header>

   <main class="container mt-4">
      <section>
         <h2 class="h5 mb-3">
            <i class="fas fa-shopping-bag me-2"></i>
            Keranjang Obat
         </h2>
         <hr class="mb-4" />

         <!-- Form untuk menambah item -->
         <form method="POST" class="mb-4 d-flex">
            <input type="text" name="name" class="form-control me-2" placeholder="Nama Obat" required>
            <input type="number" name="price" class="form-control me-2" placeholder="Harga" required>
            <input type="number" name="quantity" class="form-control me-2" placeholder="Kuantitas" required>
            <button type="submit" name="add" class="btn btn-primary">Tambah</button>
         </form>

         <!-- Tabel untuk menampilkan item -->
         <div class="cart-item">
            <?php foreach ($cartItems as $item): ?>
            <div class="item">
               <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
               <span class="font-weight-bold">Rp. <?php echo number_format($item['price'], 2); ?></span>
               <span><?php echo $item['quantity']; ?></span>
               <a href="?delete=<?php echo $item['id']; ?>" class="text-red-500">Hapus</a>
            </div>
            <?php endforeach; ?>
         </div>
      </section>
   </main>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
