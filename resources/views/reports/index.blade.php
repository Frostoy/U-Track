@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="flex h-screen bg-gray-100">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Laporan</h2>
                <div class="flex gap-3">
                    <input type="text" id="searchBar" placeholder="Cari laporan..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Laporan -->
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">User</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                            <th class="px-4 py-2 text-left">Barang</th>
                            <th class="px-4 py-2 text-left">Perubahan</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <!-- Panggil komponen table-row dengan data log -->
                            <x-reports.table-row :log="$log" />
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Fungsi pencarian
        document.getElementById('searchBar').addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tr');

            rows.forEach(row => {
                const id = row.querySelector('td:nth-child(1)');
                const user = row.querySelector('td:nth-child(2)');
                const aksi = row.querySelector('td:nth-child(3)');
                const barang = row.querySelector('td:nth-child(4)');
                const perubahan = row.querySelector('td:nth-child(5)');
                const tanggal = row.querySelector('td:nth-child(6)');

                if (id && user && aksi && barang && perubahan && tanggal) {
                    const rowText = (id.textContent + ' ' + user.textContent + ' ' + aksi.textContent + ' ' + barang.textContent + ' ' + perubahan.textContent + ' ' + tanggal.textContent).toLowerCase();

                    if (rowText.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection
