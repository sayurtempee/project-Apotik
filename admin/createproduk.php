<?php
session_start();

include '../connection.php';

$getKategori = mysqli_query($conn, "SELECT * FROM kategori");

while ($row = mysqli_fetch_assoc($getKategori)) {
    $kategori[] = $row;
}

if (isset($_POST['kirim'])) {
    $merek = $_POST['merek'];
    $kategori_id = $_POST['kategori_id'];
    $stok = $_POST['stok'];
    $tgl_produksi = $_POST['tgl_produksi'];
    $tgl_exp = $_POST['tgl_exp'];
    $komposisi = $_POST['komposisi'];
    $indikasi = $_POST['indikasi'];
    $harga = $_POST['harga'];

    $gambar = upload($_FILES['gambar']);

    if (!isset($gambar)) {
        die("ERROR");
    }

    $sql = "INSERT INTO `obat` (`merek`, `fid_kategori`, `stok_obat`, `tanggal_produksi`, `tanggal_eks`, `komposisi`, `indikasi`,`harga`, `gambar`, `fid_admin`) VALUES ('$merek', $kategori_id, '$stok', '$tgl_produksi', '$tgl_exp', '$komposisi', '$indikasi', '$harga', '$gambar', ".$_SESSION['id'].")";

    if (mysqli_query($conn, $sql)) {
        header("Location: homeadmin.php");
        exit();
    }

    echo "ERROR";
}

function upload($file)
{
    //upload gambar
    $namaFile = $file['name'];
    $ukuranFile = $file['size'];
    $tmpName = $file['tmp_name'];

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Anda belum memasukan produk')
        </script>";
        exit();
    }

    //cek ukuran gambar besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar teralu besar')
        </script>";
        exit();
    }

    //nama file duplicate
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //gambar siap di upload
    if(!move_uploaded_file($tmpName, "../img/$namaFileBaru")) {
        die("gagal upload");
    }

    return $namaFileBaru;
}

?>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        /* Additional styling for the preview image box */
        .image-preview-container {
            width: 100%;
            max-width: 400px; /* Limit the width */
            height: 500px; /* Adjust the height */
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #F59E0B; /* Border color */
            border-radius: 10px; /* Rounded corners */
            background-color: #fff; /* White background */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .image-preview-container:hover {
            transform: scale(1.05); /* Scale effect on hover */
        }

        .image-preview-container img {
            object-fit: cover; /* Make sure the image fits properly */
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .image-preview-container .no-image {
            font-size: 18px;
            color: #B0B0B0;
            text-align: center;
        }
    </style>
</head>

<body class="bg-yellow-50">
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-3">
                <i class="fas fa-user-circle text-blue-500 text-3xl"></i>
                <div>
                    <p class="text-xs text-red-500">User</p>
                    <p class="text-sm text-gray-700">Admin</p>
                </div>
            </div>
            <div class="flex items-center space-x-6 text-gray-700">
                <i class="fas fa-bell text-xl hover:text-blue-500"></i>
                <i class="fas fa-plus-circle text-xl text-red-500 hover:text-red-700"></i>
            </div>
        </div>

        <!-- Logo and Title -->
        <div class="text-center mb-6">
            <h1 class="text-5xl font-extrabold text-gray-800">CURE & CARE</h1>
        </div>

        <!-- Add Product Section -->
        <div class="flex items-center space-x-4 mb-6">
            <i class="fas fa-plus text-xl text-gray-700"></i>
            <p class="text-xl text-gray-800 font-semibold">Add New Product</p>
        </div>

        <!-- Form Container -->
        <div class="flex space-x-8">
            <!-- Left Column (Image Preview) -->
            <div class="w-1/3 flex justify-center items-center">
                <div class="image-preview-container">
                    <img id="imagePreview" src="#" alt="Image Preview" class="hidden">
                    <p class="no-image hidden">No image selected</p>
                </div>
            </div>

            <!-- Right Column (Form) -->
            <div class="w-2/3 bg-white rounded-lg shadow-lg p-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Merk -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Merk</label>
                        <input type="text" name="merek" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Kategori -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Kategori</label>
                        <select name="kategori_id" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Stok -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Stok</label>
                        <input type="number" name="stok" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Tanggal Produksi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Tanggal Produksi</label>
                        <input type="date" name="tgl_produksi" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Tanggal Exp -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Tanggal Exp</label>
                        <input type="date" name="tgl_exp" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Komposisi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Komposisi</label>
                        <input type="text" name="komposisi" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Indikasi -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Indikasi</label>
                        <input type="text" name="indikasi" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Harga -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Harga</label>
                        <input type="number" name="harga" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                    </div>

                    <!-- Gambar -->
                    <div class="mb-5">
                        <label class="block text-lg text-gray-700 font-medium">Gambar</label>
                        <input type="file" name="gambar" class="w-full p-3 bg-gray-200 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-600" onchange="previewImage(event)">
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex space-x-6">
                        <button type="submit" name="kirim" class="bg-yellow-600 text-black px-6 py-3 rounded-full hover:bg-yellow-700 transition">ADD</button>
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
            const noImageText = document.querySelector('.no-image');

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                noImageText.classList.add('hidden');
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
