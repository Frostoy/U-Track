<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Track | Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-2xl shadow-lg flex w-[70%] h-[90vh] overflow-hidden">
        <!-- Bagian Kiri (Gambar) -->
        <div class="w-1/2">
            <img draggable="false" src="{{ asset('images/medical-team.jpg') }}" alt="Medical Team"
                class="object-cover h-full w-full">
        </div>

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-gray-700">Name</label>
                <input type="text" name="username" placeholder="Enter your name"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-gray-700">Email Address</label>
                <input type="email" name="email" placeholder="Enter your email address"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Create your password"
                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg transition">
                Register Now
            </button>
        </form>

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Username -->
                <div>
                    <label class="text-gray-700">Name</label>
                    <input type="text" name="username" placeholder="Enter your name" value="{{ old('username') }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="text-gray-700">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address"
                        value="{{ old('email') }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Create your password"
                        class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg transition">
                    Register Now
                </button>
            </form>


            <p class="text-center text-gray-600 mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </div>
    </div>

</body>

</html>
