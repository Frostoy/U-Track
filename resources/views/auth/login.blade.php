<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Track | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white rounded-2xl shadow-lg flex w-[70%] h-[90vh] overflow-hidden">
    <!-- Bagian Kiri (Gambar) -->
    <div class="w-1/2">
        <img src="{{ asset('images/medical-team.jpg') }}" alt="Medical Team" class="object-cover h-full w-full">
    </div>

    <!-- Bagian Kanan (Form Login) -->
    <div class="w-1/2 p-10 flex flex-col justify-center">
        <div class="text-center mb-6">
            <img src="{{ asset('images/utrack-logo.png') }}" alt="U-Track" class="mx-auto w-20 mb-2">
            <h2 class="text-2xl font-bold text-gray-800">Login</h2>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-gray-700">Username</label>
                <input type="text" name="username" placeholder="Enter your name"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Create your password"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg transition">
                Login Now
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</div>

</body>
</html>
