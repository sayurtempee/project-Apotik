<?php
include "../connection.php";
$sql = mysqli_query($conn, "select * from report where Id ='$_GET[kode]'");
$ambildata = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f5f5dc, #f5deb3);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen relative">
    <a href="./tabeladmin.php" class="absolute top-4 left-4 text-[#7a6e5d] hover:underline">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <div class="flex items-center justify-center w-full max-w-4xl bg-[#f5f5dc] p-8 rounded-lg shadow-lg">
        <div class="w-full">
            <h2 class="text-3xl font-bold text-center mb-6 text-[#7a6e5d]">Laporan Obat</h2>
            <form method="post" action="">
                <div class="grid grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Tanggal</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="text" name="tanggal" value="<?php echo $ambildata['Tanggal'];?>" placeholder="Tanggal" />
                                <i class="fas fa-calendar-alt text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Nama Obat</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="text" name="nama" value="<?php echo $ambildata['Nama_Obat'];?>" placeholder="Nama Obat" />
                                <i class="fas fa-pills text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Kategori</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="text" name="kategori" value="<?php echo $ambildata['Kategori'];?>" placeholder="Kategori" />
                                <i class="fas fa-tags text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Jumlah Terjual</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="number" name="jumlah" value="<?= $ambildata['Jumlah_Terjual'];?>" placeholder="Jumlah Terjual" />
                                <i class="fas fa-calculator text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Harga Satuan</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="number" name="harga" value="<?= $ambildata['Harga_Satuan'];?>" placeholder="Harga Satuan" />
                                <i class="fas fa-money-bill-alt text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[#7a6e5d] mb-1">Total Penjualan</label>
                            <div class="flex items-center border-b border-[#7a6e5d] py-2">
                                <input class="appearance-none bg-transparent border-none w-full text-[#7a6e5d] py-1 px-2 leading-tight focus:outline-none" type="number" name="total" value="<?= $ambildata['Total_Penjualan'];?>" placeholder="Total Penjualan" />
                                <i class="fas fa-chart-line text-[#7a6e5d] ml-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="flex items-center justify-center mt-8">
        <button class="bg-gradient-to-r from-[#f5deb3] to-[#d2b48c] text-white font-bold py-3 px-6 rounded-full w-full text-lg transition hover:shadow-lg" type="submit" name="submit">Klick</button>
    </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    $result = $conn->query("SELECT * from report WHERE Tanggal='$_POST[tanggal]' ");

    if($result->num_rows > 0){
        echo'<script>alert("data sudah tersedia"); window.location.href="tabeladmin.php"</script>';
    }

    $sql_c= "update report set Tanggal= '$_POST[tanggal]', Nama_Obat= '$_POST[nama]', Kategori= '$_POST[kategori]', Jumlah_Terjual= '$_POST[jumlah]', Harga_Satuan= '$_POST[harga]', Total_Penjualan= '$_POST[total]'".
    "where Id  = '$_GET[kode]'";

    
    $result= $conn->query($sql_c);
    if($result){
        echo'<script>alert("behasil update"); window.location.href="tabeladmin.php"</script>';
    } else {
        echo'<script>alert("data sudah tersedia"); window.location.href="tabeladmin.php"</script>';
    }
    
}
?>
