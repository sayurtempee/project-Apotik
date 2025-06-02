<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Health Website</title>
   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="./css/style.css">
   <style>
      body {
         background-image: url('./img/background-img.png');
         background-size: cover;
         background-position: center;
      }

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
      <!-- Tombol untuk membuka modal login -->
      <div>
    <button id="openModalBtn" class="open-modal-btn" onclick="location.href='login.php'">Login</button>
      </div>

   </header>

   <!-- Hero Section -->
   <section class="hero">
      <div class="hero-content">
         <h1>Dengan Kesehatan Yang Baik, Kita Memiliki Segalanya</h1>
         <p>Kesehatan bukan hanya tentang apa yang kita makan tetapi juga tentang apa yang kita pikirkan dan katakan.</p>
      </div>
   </section>
</body>

</html>