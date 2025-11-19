<div class="bg-white rounded-xl shadow-md p-4">
    <table class="w-full text-sm">
        <thead class="border-b border-gray-200 text-gray-600">
            <tr class="text-left">
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">User</th>
                <th class="py-3 px-4">Aksi</th>
                <th class="py-3 px-4">Barang</th>
                <th class="py-3 px-4">Perubahan</th>
                <th class="py-3 px-4">Tanggal</th>
            </tr>
        </thead>

        <tbody id="logsTable" class="text-gray-700">
            @foreach ($logs as $log)
                <!-- Menggunakan komponen table-row untuk setiap baris -->
                <x-reports.table-row :log="$log" />
            @endforeach
        </tbody>
    </table>
</div>
