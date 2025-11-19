<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg p-6 w-96 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Edit Obat</h2>
            <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Nama Obat</label>
                <input type="text" name="name" id="editName"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Kategori</label>
                <select name="category_id" id="editCategory"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Jumlah Stok</label>
                <input type="number" name="stock_quantity" id="editStock"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="mb-3">
                <label class="block text-gray-700 text-sm font-medium mb-1">Tanggal Kedaluwarsa</label>
                <input type="date" name="expiry_date" id="editExpiry"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required>
            </div>
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white">
                    Update
                </button>
            </div>
        </form>
    </div>
    
</div>
