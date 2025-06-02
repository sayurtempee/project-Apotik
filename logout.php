<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0e6d2;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="flex p-10 rounded-lg shadow-lg">
        <div class="flex items-center justify-center w-1/2">
            <img alt="Medical items including a clipboard, pills, and a medicine bottle" class="w-3/4" height="300" src="https://storage.googleapis.com/a1aa/image/dui0IZKgHc7sM1vrP01V0DmMzyaXaUaABHeY0ZoPbUe0lisTA.jpg" width="300" />
        </div>
        <div class="w-1/2 p-10 bg-[#f0e6d2] rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center mb-8">
                LOGOUT
            </h2>
            <p class="text-center text-lg mb-4">
                Are you sure you want to logout?
            </p>
            <div class="flex items-center justify-center">
                <a class="bg-[#d1c4a9] hover:bg-[#c0b08e] text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline mr-4" href="logout_session.php">
                    Yes, Logout
                </a>
                <button onclick="window.history.back()" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</body>

</html>
