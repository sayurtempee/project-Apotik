<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f5f1d6] p-6">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center">
            <i class="fas fa-user-circle text-blue-500 text-3xl"></i>
            <div class="ml-3">
                <p class="text-red-500 text-sm">User</p>
                <p class="text-black font-bold">Admin</p>
            </div>
        </div>
        <div class="flex items-center space-x-6">
            <i class="fas fa-bell text-gray-700 text-xl hover:text-gray-900 cursor-pointer"></i>
            <a href="./form_report.php"><i class="fas fa-plus-circle text-gray-700 text-xl hover:text-gray-900 cursor-pointer"></i></a>
        </div>
    </div>

    <!-- Back Button -->
    <div class="flex items-center mb-8">
    <a href="tableadmin.php" class="absolute top-4 left-4 text-[#7a6e5d] hover:underline">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    </div>

    <!-- Title Section -->
    <h1 class="text-center text-4xl font-bold text-gray-800 mb-2">REPORT</h1>
    <hr class="border-t border-gray-400 mb-6">

    <!-- Subtitle Section -->
    <h2 class="text-red-500 text-2xl font-semibold mb-4">Data Obat</h2>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 shadow-lg bg-white rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="border border-gray-300 p-3 text-left">No</th>
                    <th class="border border-gray-300 p-3 text-left">Tanggal</th>
                    <th class="border border-gray-300 p-3 text-left">Nama Obat</th>
                    <th class="border border-gray-300 p-3 text-left">Kategori</th>
                    <th class="border border-gray-300 p-3 text-left">Jumlah Terjual</th>
                    <th class="border border-gray-300 p-3 text-left">Harga Satuan</th>
                    <th class="border border-gray-300 p-3 text-left">Total Penjualan</th>
                    <th class="border border-gray-300 p-3 text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../connection.php";
                $id = 1;
                $ambildata = mysqli_query($conn, "select * from report");
                while ($tampil = mysqli_fetch_array($ambildata)) {
                    echo "
                    <tr class='hover:bg-gray-100 text-gray-800'>
                        <td class='border border-gray-300 p-3'>$id</td>
                        <td class='border border-gray-300 p-3'>$tampil[Tanggal]</td>
                        <td class='border border-gray-300 p-3'>$tampil[Nama_Obat]</td>
                        <td class='border border-gray-300 p-3'>$tampil[Kategori]</td>
                        <td class='border border-gray-300 p-3'>$tampil[Jumlah_Terjual]</td>
                        <td class='border border-gray-300 p-3'>Rp $tampil[Harga_Satuan]</td>
                        <td class='border border-gray-300 p-3'>Rp $tampil[Total_Penjualan]</td>
                        <td class='border border-gray-300 p-3 text-center'>
                            <a href='barang-ubah.php?kode=$tampil[Id]' class='text-blue-500 hover:underline'>Edit</a>
                        </td>
                        <td class='border border-gray-300 p-3 text-center'>
                            <a href='hapus.php?kode=$tampil[Id]' class='text-red-500 hover:underline'>Delete</a>
                        </td>
                    </tr>";
                    $id++;
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>