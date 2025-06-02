<?php
session_start();
include '../connection.php';

// Cek apakah ID produk ada di URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Ambil data produk dari database
    $query = "SELECT * FROM obat WHERE id = '$productId'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Produk tidak ditemukan!";
        exit();
    }
}

// Ambil data kategori dari tabel kategori
$categoryQuery = "SELECT * FROM kategori";
$categoryResult = mysqli_query($conn, $categoryQuery);

// Proses saat form di-submit untuk memperbarui produk
if (isset($_POST['update'])) {
    $merek = $_POST['merek'];
    $kategoriKode = $_POST['kategori'];
    $stok_obat = $_POST['stok'];
    $tanggal_produksi = $_POST['tgl_produksi'];
    $tanggal_eks = $_POST['tgl_exp'];
    $komposisi = $_POST['komposisi'];
    $indikasi = $_POST['indikasi'];
    $harga = $_POST['harga']; // Mengambil kode kategori dari form

    // Menangani file gambar (opsional jika gambar diubah)
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $targetDir = "../img/";
        $targetFile = $targetDir . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
    } else {
        // Jika gambar tidak diubah, gunakan gambar yang sudah ada
        $gambar = $product['gambar'];
    }

    // Query untuk memperbarui produk dengan kode kategori
    $updateQuery = "UPDATE obat SET 
                    merek = '$merek',
                    kategori = '$kategoriKode',
                    stok_obat = '$stok_obat',
                    tanggal_produksi = '$tanggal_produksi',
                    tanggal_eks = '$tanggal_eks',
                    komposisi = '$komposisi',
                    indikasi = '$indikasi',
                    harga = '$harga',
                    gambar = '$gambar'
                    WHERE id = '$productId'";

    if (mysqli_query($conn, $updateQuery)) {
        // Redirect setelah berhasil update
        header("Location: homeadmin.php?update=success");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-yellow-50">
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-3">
                <i class="fas fa-user-circle text-blue-500 text-3xl"></i>
                <div>
                    <p class="text-xs text-red-500">User</p>
                    <p class="text-sm text-gray-700">Admin</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-6">
            <h1 class="text-5xl font-extrabold text-gray-800">CURE & CARE</h1>
        </div>

        <div class="flex items-center space-x-4 mb-6">
            <i class="fas fa-edit text-xl text-gray-700"></i>
            <p class="text-xl text-gray-800 font-semibold">Update Product</p>
        </div>

        <div class="flex space-x-8">
            <div class="w-1/3 flex justify-center items-center">
                <div class="image-preview-container">
                    <img id="imagePreview" src="../img/<?= $product['gambar'] ?>" alt="Current Product Image">
                </div>
            </div>

            <div class="w-2/3 bg-white rounded-lg shadow-lg p-8">
                <form method="POST" enctype="multipart/form-data">
                    <!-- Merk -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Merk</label>
                        <input type="text" name="merek" value="<?= $product['merek'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Kategori -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Kategori</label>
                        <select name="kategori" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600" required>
                            <?php while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                                <option value="<?= $category['kode_kategori'] ?>" <?= $product['kategori'] == $category['kode_kategori'] ? 'selected' : '' ?>><?= $category['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Stok -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Stok</label>
                        <input type="number" name="stok" value="<?= $product['stok_obat'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Tanggal Produksi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Tanggal Produksi</label>
                        <input type="date" name="tgl_produksi" value="<?= $product['tanggal_produksi'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Tanggal Exp -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Tanggal Exp</label>
                        <input type="date" name="tgl_exp" value="<?= $product['tanggal_eks'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Komposisi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Komposisi</label>
                        <input type="text" name="komposisi" value="<?= $product['komposisi'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Indikasi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Indikasi</label>
                        <input type="text" name="indikasi" value="<?= $product['indikasi'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Harga -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Harga</label>
                        <input type="number" name="harga" value="<?= $product['harga'] ?>" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Gambar -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Gambar</label>
                        <input type="file" name="gambar" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600" onchange="previewImage(event)">
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex space-x-6">
                        <button type="submit" name="update" class="bg-yellow-600 text-black px-6 py-3 rounded-full hover:bg-yellow-700 transition">UPDATE</button>
                        <button type="reset" class="bg-yellow-600 text-black px-6 py-3 rounded-full hover:bg-yellow-700 transition">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const file = event.target.files[0];
            const imagePreview = document.getElementById('imagePreview');

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
