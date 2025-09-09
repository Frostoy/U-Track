<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | U-Track</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200 flex justify-center items-center min-h-screen">
    <div class="bg-gradient-to-b from-gray-100 to-yellow-100 rounded-2xl shadow-xl w-full max-w-4xl min-h-[80vh] flex flex-col justify-center items-center p-8 md:p-16 mx-4">
        <!-- Logo -->
        <img src="{{ asset('images/utrack-logo.png') }}" alt="U-Track" class="mx-auto w-40 mb-8">

        <h2 class="text-3xl md:text-4xl font-bold mb-10">Login</h2>
        
        <form action="{{ route('login') }}" method="POST" class="w-full max-w-md space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Username:</label>
                <input type="text" name="username" class="w-full rounded-full p-3 border focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password:</label>
                <input type="password" name="password" class="w-full rounded-full p-3 border focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>
            <a href="#" class="block text-sm text-blue-600 text-left hover:underline">Forgot password?</a>
            
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white w-full py-3 rounded-md font-semibold transition">Login</button>
        </form>

        <p class="mt-6 text-sm">Don’t have an account? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>.
        </p>
    </div>
</body>
</html>
