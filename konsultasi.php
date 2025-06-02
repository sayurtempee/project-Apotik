<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Konsultasi Dokter - ACC   </title>
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="./css/style.css">
   <style>
      body {
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

      .password-container {
         position: relative;
         display: inline-block;
      }

      .password-container input {
         width: 100%;
         padding-right: 40px;
         /* Ruang untuk ikon mata di sebelah kanan */
         padding-left: 10px;
         height: 35px;
         font-size: 16px;
         border-radius: 5px;
         border: 1px solid #ccc;
      }

      .password-container .toggle-password {
         position: absolute;
         right: 10px;
         top: 50%;
         transform: translateY(-50%);
         cursor: pointer;
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
         <button id="openModalBtn" class="open-modal-btn">Login</button>
      </div>

      <!-- Modal -->
      <div id="loginModal" class="modal">
         <div class="modal-content">
            <span class="close">&times;</span>
            <h2 style="font-weight: bold;">Login</h2>
            <form id="loginForm">
               <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
               </div>
               <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                  <span class="toggle-password">
                     <i class="fas fa-eye"></i> <!-- Ikon mata -->
                  </span>
               </div>
               <button type="submit" class="submit-btn"><a href="./customer/dashboard.php">Submit</a></button>
            </form>
         </div>
      </div>

   </header>

   <!-- Hero Section -->
   <main class="container mx-auto py-8 px-6">
        <section class="mb-12">
            <h2 class="text-2xl font-bold text-center mb-6">Konsultasi Dokter</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" placeholder="Nama" type="text"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Email" type="email"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Nomor Telepon</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" placeholder="Nomor Telepon" type="tel"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Pesan</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Pesan" rows="4"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

   <script>
      // Mengambil elemen dari DOM
      const modal = document.getElementById("loginModal");
      const openModalBtn = document.getElementById("openModalBtn");
      const closeModalBtn = document.querySelector(".close");
      const form = document.getElementById("loginForm");

      // Fungsi untuk membuka modal
      openModalBtn.onclick = function() {
         modal.style.display = "flex";
      }

      // Fungsi untuk menutup modal
      closeModalBtn.onclick = function() {
         modal.style.display = "none";
      }

      // Menutup modal saat klik di luar modal
      window.onclick = function(event) {
         if (event.target == modal) {
            modal.style.display = "none";
         }
      }

      // Simulasi form login
      form.onsubmit = function(event) {
         event.preventDefault();
         const username = document.getElementById("username").value;
         const password = document.getElementById("password").value;

         // Contoh sederhana, validasi username dan password
         if (username === "admin" && password === "1234") {
            alert("Login berhasil!");
            modal.style.display = "none";
         } else {
            alert("Username atau password salah!");
         }
      }

      // Ambil elemen input password dan ikon mata
      const passwordInput = document.getElementById('password');
      const togglePasswordIcon = document.querySelector('.toggle-password i');

      // Tambahkan event listener ke ikon mata
      togglePasswordIcon.addEventListener('click', function() {
         // Cek tipe input saat ini (password atau text)
         const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';

         // Ubah tipe input menjadi text atau password
         passwordInput.setAttribute('type', type);

         // Ganti ikon mata tergantung apakah password ditampilkan atau disembunyikan
         this.classList.toggle('fa-eye');
         this.classList.toggle('fa-eye-slash');
      });
              // JavaScript for handling modal login, if needed
        const openModalBtn = document.getElementById("openModalBtn");
        // const modal = document.getElementById("loginModal");
        const closeModalBtn = document.querySelector(".close");
        
        openModalBtn.onclick = function() {
            modal.style.display = "flex";
        }
        
        closeModalBtn.onclick = function() {
            modal.style.display = "none";
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
   </script>
</body>

</html>