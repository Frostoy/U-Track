<div class="bg-white rounded-xl shadow-md p-4">
    <table class="w-full text-sm">
        <thead class="border-b border-gray-200 text-gray-600">
            <tr class="text-left">
                <th class="pb-3">ID</th>
                <th class="pb-3">Nama Obat</th>
                <th class="pb-3">Kategori</th>
                <th class="pb-3">Stok</th>
                <th class="pb-3">Kadaluarsa</th>
                <th class="pb-3">Aksi</th>
            </tr>
        </thead>
        <tbody id="inventoryTable" class="text-gray-700">
            @forelse($medicines as $med)
                @include('components.inventory.table-row', ['med' => $med])
            @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">
                        Belum ada obat dalam inventaris
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
