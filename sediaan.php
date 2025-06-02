<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kategori Obat - Apotek Cure and Care</title>
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

      .tabs {
         text-align: center;
         margin-bottom: 20px;
      }

      .tab-button {
         padding: 10px 20px;
         margin: 0 10px;
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 50px;
         cursor: pointer;
      }

      .tab-button:hover {
         background-color: #f0f0f0;
      }

      .kategori-obat {
         margin-bottom: 30px;
      }

      .kategori-obat h2 {
         font-size: 24px;
         margin-bottom: 20px;
         text-align: center;
      }

      .obat-list {
         display: flex;
         justify-content: space-around;
         flex-wrap: wrap;
      }

      .obat-item {
         background-color: #fff;
         padding: 15px;
         margin: 10px;
         text-align: center;
         border-radius: 10px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         width: 350px;
      }

      .obat-item img {
         max-width: 100px;
         height: auto;
         margin-bottom: 10px;
      }

      .obat-item p {
         margin: 5px 0;
      }
      
      .obat-item a{
         text-decoration: none;
         color: black;
      }

      .obat-item button {
         padding: 10px 14px;
         background-color: #FF7F00;
         color: #000;
         border: none;
         border-radius: 50px;
         cursor: pointer;
         margin-top: 10px;
      }

      .obat-item button:hover {
         background-color: #CC6600;
      }

      .obat-item .btn-beli {
         color: #000;
         background-color: #89E689;
         border: none;
         border-radius: 50px;
         cursor: pointer;
         margin-top: 10px;
      }

      .obat-item .btn-beli:hover {
         background-color: #66B266;
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
      <!-- Tombol untuk kategori obat -->
      <div class="tabs">
         <button class="tab-button" onclick="showCategory('obat-umum')">Obat Umum</button>
         <button class="tab-button" onclick="showCategory('obat-bebas-terbatas')">Obat Bebas Terbatas</button>
         <button class="tab-button" onclick="showCategory('obat-resep-dokter')">Obat Resep Dokter</button>
      </div>

      <!-- Kategori Obat Umum -->
      <section id="obat-umum" class="kategori-obat">
         <h2 style="font-weight: bold;">Obat Umum</h2>
         <div class="obat-list">
            <div class="obat-item">
               <img src="./img/insto.png" alt="insto">
               <h3>INSTO</h3>
               <p>Reguler 7.5 ml <br> Obat Tetes Mata</p>
               <br>
               <p>Rp 14.000</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
               <i class="bi bi-wallet2"></i> Beli
               </button>

            </div>
            <div class="obat-item">
               <img src="./img/bodrex.png" alt="bodrex">
               <h3>BODREX</h3>
               <p>1 Strip Isi 4 Tablet <br>
                  meringankan sakit kepala, sakit gigi, dan menurunkan demam.</p>
               <p>Rp 3.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/diapet.png" alt="Diapet">
               <h3>Diapet</h3>
               <p>Strip Isi 10 Kapsul <br>
                  membantu mengurangi frekuensi buang air besar </p>
               <p>Rp 6.410</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/diapet.png" alt="Diapet">
               <h3>Diapet</h3>
               <p>Strip Isi 10 Kapsul <br>
                  membantu mengurangi frekuensi buang air besar </p>
               <p>Rp 6.410</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/diapet.png" alt="Diapet">
               <h3>Diapet</h3>
               <p>Strip Isi 10 Kapsul <br>
                  membantu mengurangi frekuensi buang air besar </p>
               <p>Rp 6.410</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/diapet.png" alt="Diapet">
               <h3>Diapet</h3>
               <p>Strip Isi 10 Kapsul <br>
                  membantu mengurangi frekuensi buang air besar </p>
               <p>Rp 6.410</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
         </div>
      </section>

      <!-- Kategori Obat Bebas Terbatas -->
      <section id="obat-bebas-terbatas" class="kategori-obat" style="display:none;">
         <h2 style="font-weight: bold;">Obat Bebas Terbatas</h2>
         <div class="obat-list">
            <div class="obat-item">
               <img src="./img/proris.png" alt="proris">
               <h3>PRORIS</h3>
               <p>Rasa Jeruk 60 Ml
                  Menurunkan demam pada anak-anak</p>
               <p>Rp Rp 35.868</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/betadine_kumur.png" alt="betadine_kumur">
               <h3>BETADINE KUMUR</h3>
               <p>Untuk rongga mulut seperti gusi bengkak, sariawan, bau mulut dan napas tak segar.</p>
               <p>Rp 44.900</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/retop.png" alt="retop">
               <h3>RETOP</h3>
               <p>30 Kapsul/Dus <br>
                  Membantu memelihara kesehatan mata.</p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/retop.png" alt="retop">
               <h3>RETOP</h3>
               <p>30 Kapsul/Dus <br>
                  Membantu memelihara kesehatan mata.</p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/retop.png" alt="retop">
               <h3>RETOP</h3>
               <p>30 Kapsul/Dus <br>
                  Membantu memelihara kesehatan mata.</p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/retop.png" alt="retop">
               <h3>RETOP</h3>
               <p>30 Kapsul/Dus <br>
                  Membantu memelihara kesehatan mata.</p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
         </div>
      </section>

      <!-- Kategori Obat Resep Dokter -->
      <section id="obat-resep-dokter" class="kategori-obat" style="display:none;">
         <h2 style="font-weight: bold;">Obat Resep Dokter</h2>
         <div class="obat-list">
            <div class="obat-item">
               <img src="./img/ventolin_inhaler.png" alt="ventolin_inhaler">
               <h3>VENTOLIN INHALER</h3>
               <p>0.1 mg 200 Dosis <br> Meredakan serangan atau pencegahan asma.</p>
               <p>Rp 151.700</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/asthalin_inhaler.png" alt="asthalin_inhaler">
               <h3>ASTHALIN INHALER</h3>
               <p>100 McgDose<br>
                  Alat Bantu Pernafasan.</p>
               <p>Rp 173.000</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/dermovate.png" alt="dermovate">
               <h3>DERMOVATE</h3>
               <p>Obat Kulit <br>
                  5 GR </p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/dermovate.png" alt="dermovate">
               <h3>DERMOVATE</h3>
               <p>Obat Kulit <br>
                  5 GR </p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/dermovate.png" alt="dermovate">
               <h3>DERMOVATE</h3>
               <p>Obat Kulit <br>
                  5 GR </p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'">
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
            <div class="obat-item">
               <img src="./img/dermovate.png" alt="dermovate">
               <h3>DERMOVATE</h3>
               <p>Obat Kulit <br>
                  5 GR </p>
               <p>Rp 89.100</p>
               <button class="btn-beli" onclick="window.location.href='login.php'"> 
                  <i class="bi bi-wallet2"></i> Beli</button>
            </div>
         </div>
      </section>
   </main>

   <!-- link CDN untuk scrool -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js"></script>
   <script>
      function showCategory(category) {
         // Sembunyikan semua section
         document.getElementById('obat-umum').style.display = 'none';
         document.getElementById('obat-bebas-terbatas').style.display = 'none';
         document.getElementById('obat-resep-dokter').style.display = 'none';

         // Tampilkan section yang dipilih
         document.getElementById(category).style.display = 'block';
      }

      const scroll = new SmoothScroll('a[href*="#"]', {
         speed: 300,
         speedAsDuration: true
      });

   </script>
</body>

</html>