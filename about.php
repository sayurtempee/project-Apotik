<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apotek Cure and Care</title>
   <!-- Bootstrap 5 CSS CDN -->
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
      }

      .layanan-terbaik,
      .produk-rekomendasi {
         margin: 10px 0;
      }

      .layanan-terbaik h2,
      .produk-rekomendasi h2 {
         margin-bottom: 20px;
         font-size: 24px;
         color: #333;
      }

      .services,
      .products {
         display: flex;
         justify-content: center;
         gap: 30px;
      }

      .service,
      .product {
         background-color: #fff;
         border-radius: 10px;
         padding: 20px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         width: 150px;
         text-align: center;
      }

      .service img,
      .product img {
         max-width: 80px;
         margin-bottom: 10px;
      }

      .service p,
      .product p {
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
      <!-- Tombol untuk membuka modal login -->
      <div>
    <button id="openModalBtn" class="open-modal-btn" onclick="location.href='login.php'">Login</button>
      </div>

   </header>

   <main>
      <section class="layanan-terbaik">
         <h2>Layanan Terbaik</h2>
         <div class="services">
            <button type="button" class="service" style="background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">      
               <img src="./img/icon-konsultasi-dokter.png" alt="Konsultasi Dokter">
               <p>Konsultasi Dokter</p>
            </button>
            <button type="button" class="service">
               <img src="./img/resep.png" alt="Resep">
               <p>Resep</p>
            </button>
            <button type="button" class="service">
               <img src="./img/pengiriman-cepat.png" alt="Pengiriman Cepat">
               <p>Pengiriman Cepat</p>
            </button>
            <button type="button" class="service">
               <img src="./img/big-shale.png" alt="Big Sale">
               <p>Big Sale</p>
            </button>
         </div>
      </section>

      <section class="produk-rekomendasi">
         <h2>Produk Rekomendasi</h2>
         <div class="products">
            <div class="product">
               <img src="./img/new-product.png" alt="Kebutuhan Lain">
               <p>Kebutuhan Lain</p>
               <a href="kebutuhan_lain.php"><button type="button" class="btn btn-outline-dark" style="margin-top: 3px;">Click Here</button></a>
            </div>
            <div class="product">
               <img src="./img/promo.png" alt="Promo">
               <p>Promo</p>
               <a href="diskon.php"><button type="button" class="btn btn-outline-dark" style="margin-top: 24px;">Click Here</button></a>
            </div>
            <div class="product">
               <img src="./img/susu.png" alt="Susu Anak & Dewasa">
               <p>Susu Anak & Dewasa</p>
               <a href="susuAnakDewasa.php"><button type="button" class="btn btn-outline-dark">Click Here</button></a>
            </div>
         </div>
      </section>
   </main>
</body>

</html>