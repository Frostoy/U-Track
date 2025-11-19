<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg p-6 w-96 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Tambah Obat Baru</h2>
            <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>
        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Nama Obat</label>
                <input type="text" name="name"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Kategori</label>
                <select name="category_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Jumlah Stok</label>
                <input type="number" name="stock_quantity"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Tanggal Kedaluwarsa</label>
                <input type="date" name="expiry_date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeAddModal()"
                    class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">
                    Simpan
                </button>
            </div>
        </form>
        
    </div>
</div>
