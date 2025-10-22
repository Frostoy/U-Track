<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports | U-Track</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

<div class="flex h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-[#0f172a] text-white flex flex-col p-5">
        <div class="flex items-center mb-8">
            <img src="{{ asset('images/utrack-logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full mr-2">
            <h4 class="text-xl font-semibold">U-Track</h4>
        </div>

        <nav class="flex flex-col gap-2">
            <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-[#1e293b]">
                <span>📊 Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 bg-[#1e293b] rounded-lg">
                <span>📦 Data Barang</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-[#1e293b]">
                <span>📋 Laporan</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-[#1e293b]">
                <span>🔔 Notifikasi</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-[#1e293b]">
                <span>⚙️ Pengaturan</span>
            </a>
        </nav>

        <div class="mt-auto pt-5 border-t border-gray-600 text-center">
            <button class="w-full py-2 bg-indigo-500 rounded-lg hover:bg-indigo-600 text-sm font-semibold mb-3">
                Upgrade Now
            </button>

            <div class="flex items-center justify-center gap-2 bg-[#1e293b] p-3 rounded-lg">
                <img src="{{ asset('img/profile.png') }}" class="w-8 h-8 rounded-full" alt="">
                <div>
                    <p class="text-sm font-medium">Admin</p>
                    <p class="text-xs text-gray-400">Free Account</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Data Barang</h2>
            <button onclick="openForm()" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                + Tambahkan Data
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-md p-4">
            <table class="w-full text-sm">
                <thead class="border-b border-gray-200 text-gray-600">
                    <tr class="text-left">
                        <th class="pb-3">Kode</th>
                        <th class="pb-3">Nama Barang</th>
                        <th class="pb-3">Jumlah Stok</th>
                        <th class="pb-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr class="hover:bg-gray-50">
                        <td class="py-3">A001</td>
                        <td class="py-3 flex items-center gap-2">
                            <img src="{{ asset('img/profile.png') }}" class="w-8 h-8 rounded-full"> 
                            Plester Luka
                        </td>
                        <td class="py-3">12</td>
                        <td class="py-3 text-gray-400 cursor-pointer">...</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3">A002</td>
                        <td class="py-3 flex items-center gap-2">
                            <img src="{{ asset('img/profile.png') }}" class="w-8 h-8 rounded-full"> 
                            Perban
                        </td>
                        <td class="py-3">8</td>
                        <td class="py-3 text-gray-400 cursor-pointer">...</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3">A003</td>
                        <td class="py-3 flex items-center gap-2">
                            <img src="{{ asset('img/profile.png') }}" class="w-8 h-8 rounded-full"> 
                            Minyak Kayu Putih
                        </td>
                        <td class="py-3">15</td>
                        <td class="py-3 text-gray-400 cursor-pointer">...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Sidebar Form -->
    <div id="formPanel" class="fixed right-0 top-0 w-96 bg-white h-full shadow-lg transform translate-x-full transition-transform duration-300 p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Tambahkan Data</h3>
            <button onclick="closeForm()" class="text-gray-500 hover:text-gray-700">✕</button>
        </div>

        <div class="text-center mb-6">
            <img src="{{ asset('img/profile.png') }}" class="w-20 h-20 mx-auto rounded-full mb-2">
            <p class="text-sm text-gray-500">Upload Foto</p>
        </div>

        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Barang</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan Nama Barang">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kode Barang</label>
                <input type="text" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: A004">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jumlah Stok</label>
                <input type="number" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="Jumlah Stok">
            </div>
            <button type="submit" class="w-full py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                Tambah Barang
            </button>
        </form>
    </div>

</div>

<script>
function openForm() {
    document.getElementById('formPanel').classList.remove('translate-x-full');
}
function closeForm() {
    document.getElementById('formPanel').classList.add('translate-x-full');
}
</script>

</body>
</html>
