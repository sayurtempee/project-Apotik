<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f7f6d9] min-h-screen flex flex-col justify-between relative">
    <header class="flex justify-between items-center p-4">
        <div class="flex items-center space-x-2">
            <i class="fas fa-user-circle text-blue-500 text-2xl"></i>
            <div>
                <p class="text-red-500 text-sm">User</p>
                <p class="text-black text-sm">Admin</p>
            </div>
        </div>
        <div class="flex space-x-4">
            <i class="fas fa-bell text-2xl"></i>
            <i class="fas fa-plus-circle text-2xl"></i>
        </div>
    </header>
    <main class="flex-grow flex flex-col items-center">
        <h1 class="text-3xl font-bold mt-8">Informasi Penjualan</h1>
        <section class="mt-8 w-full max-w-4xl px-8">
            <div class="flex items-center space-x-2 mb-4">
                <i class="fas fa-calendar-alt text-2xl"></i>
                <h2 class="text-xl font-bold">Produk Anda</h2>
            </div>
            <hr class="border-t border-black mb-8">
            <div class="grid grid-cols-4 gap-8 text-center">
                <div>
                    <i class="fas fa-shopping-bag text-4xl text-gray-700"></i>
                    <p class="mt-2 text-lg">Product</p>
                </div>
                <div>
                    <i class="fas fa-truck text-4xl text-gray-700"></i>
                    <p class="mt-2 text-lg">pick up</p>
                </div>
                <div>
                    <i class="fas fa-star text-4xl text-gray-700"></i>
                    <p class="mt-2 text-lg">Rating</p>
                </div>
                <div>
                    <i class="fas fa-chart-line text-4xl text-gray-700"></i>
                    <p class="mt-2 text-lg">Report</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="flex justify-center items-center">
        <div class="fixed bottom-4 z-100 bg-black text-white rounded-full py-2 px-8 flex justify-around w-3/4 max-w-md">
            <div class="text-center">
                <i class="fas fa-home text-2xl"></i>
                <p class="mt-1">Home</p>
            </div>
            <div class="text-center">
                <i class="fas fa-calendar-alt text-2xl text-orange-500"></i>
                <p class="mt-1 text-orange-500">Informasi</p>
            </div>
            <div class="text-center">
                <i class="fas fa-user text-2xl"></i>
                <p class="mt-1">Profile</p>
            </div>
        </div>
    </footer>
</body>
</html>