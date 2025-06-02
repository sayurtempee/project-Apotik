<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cure & Care</title>
   <!-- tailwind -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- Bootstrap 5 CSS CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- icon bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../css/style.css">
   <style>
      .user-header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         background-color: rgba(0, 0, 0, 0.15);
         padding: 10px 20px;
      }

      .user-info {
         display: flex;
         align-items: center;
      }

      .user-icon {
         width: 30px;
         height: 30px;
         margin-right: 10px;
      }

      .user-text {
         display: flex;
         flex-direction: column;
      }

      .user-name {
         color: red;
         font-size: 20px;
      }

      .user-role {
         color: black;
         font-size: 18px;
         font-weight: bold;
      }

      .user-actions {
         display: flex;
         gap: 20px;
      }

      .action-btn {
         background-color: white;
         border: none;
         border-radius: 50%;
         padding: 10px;
         cursor: pointer;
         width: 40px;
         height: 40px;
         transition: background-color 0.3s ease;
      }

      /* .action-btn img {
         width: 20px;
         height: 20px;
      } */

      .action-btn:hover {
         background-color: #e0e0e0;
      }

      .cart-item {
         margin-bottom: 20px;
      }

      .item {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 10px;
         background-color: #f0f0db;
         border-radius: 8px;
      }

      .item-image {
         width: 100px;
      }

      .item-details {
         display: flex;
         flex-direction: column;
         margin-left: 10px;
         flex-grow: 1;
      }

      .item-name {
         font-size: 20px;
         font-weight: bold;
         margin-bottom: 8px;
      }

      .item-quantity {
         display: flex;
         align-items: center;
      }

      .quantity-btn {
         background-color: #d9534f;
         border: none;
         color: white;
         font-size: 14px;
         padding: 4px 8px;
         margin: 0 5px;
         border-radius: 4px;
         cursor: pointer;
      }

      .text-red-500 {
         font-size: 25px;
      }

      .total-price {
         text-align: right;
         font-size: 18px;
         font-weight: bold;
         margin-bottom: 20px;
      }

      .font-bold {
         font-size: 20px;
      }
   </style>
</head>

<body>
   <!-- header  -->
   <header class="user-header">
      <div class="user-info">
         <!-- <img src="user-icon.png" alt="User Icon" class="user-icon"> -->
         <i class="bi bi-person-circle" style="font-size: 40px; margin-left:10px; margin-right:20px;"></i>
         <div class="user-text">
            <span class="user-name">User</span>
            <span class="user-role">Customer</span>
         </div>
      </div>
      <div class="user-actions">
         <button class="action-btn">
            <!-- <img src="bell-icon.png" alt="Notification Icon"> -->
            <a href="./notifikasi.php"><i class="bi bi-bell"></i></a>
         </button>
         <button class="action-btn">
            <!-- <img src="cart-icon.png" alt="Cart Icon"> -->
            <a href="./keranjang.php"><i class="bi bi-cart"></i></a>
         </button>
      </div>
   </header>

   <div class="flex justify-between items-center p-4">
      <a href="./dashboard.php"><i class="fas fa-arrow-left text-2xl"> Back</i></a>
   </div>

   <div class="p-4">
      <div class="flex items-center mb-4">
         <i class="fas fa-bell text-2xl"></i>
         <h2 class="text-xl font-bold ml-2">Notifikasi</h2>
      </div>
      <hr class="border-t border-black mb-4" />
      <div class="space-y-4">
         <div class="flex items-center bg-[#e9e7a0] p-4 rounded-lg">
            <img src="https://placehold.co/50x50" alt="Notification bell icon" class="w-12 h-12">
            <div class="ml-4">
               <p>Pesanan Anda sudah dikonfirmasi!</p>
               <p>Silahkan ambil sesuai jam yang telah di tentukan.</p>
            </div>
         </div>
         <div class="flex items-center bg-[#e9e7a0] p-4 rounded-lg">
            <img src="https://placehold.co/50x50" alt="Notification bell icon" class="w-12 h-12">
            <div class="ml-4">
               <p>Tranksaksi berhasil!</p>
               <p>Terima Kasih sudah berbelanja di toko kami.</p>
            </div>
         </div>
         <div class="flex items-center bg-[#e9e7a0] p-4 rounded-lg">
            <img src="https://placehold.co/50x50" alt="Notification bell icon" class="w-12 h-12">
            <div class="ml-4">
               <p>Ingat! Waktunya minum obat Anda. <span class="text-red-500">💊</span> Tetap sehat, ya!</p>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap 5 JS and Popper.js -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>