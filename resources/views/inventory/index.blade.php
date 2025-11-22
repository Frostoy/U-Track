@extends('layouts.app')

@section('title', 'Inventaris')

@section('content')
<<<<<<< HEAD
    <div class="flex h-screen bg-gray-100">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Inventaris</h2>
                <div class="flex gap-3">
                    <button onclick="openAddModal()"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                        + Tambah Barang
                    </button>
                    <input type="text" id="searchBar" placeholder="Cari inventaris..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <x-inventory.table :medicines="$medicines" />
        </div>

        <!-- Add Medicine Modal -->
        <x-inventory.create :categories="$categories" />

        <!-- Edit Modal -->
        <x-inventory.edit :categories="$categories" />

    </div>
@endsection

@section('scripts')
    <script>
        // Modal functions
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(id, name, categoryId, stock, expiry) {
            document.getElementById('editName').value = name;
            document.getElementById('editCategory').value = categoryId;
            document.getElementById('editStock').value = stock;
            document.getElementById('editExpiry').value = expiry;
            document.getElementById('editForm').action = '/inventory/' + id;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Search functionality
        document.getElementById('searchBar').addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.medicine-row');

            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const category = row.getAttribute('data-category');

                if (name.includes(query) || category.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
=======
    <div class="bg-[#9ea6ae] min-h-screen flex flex-col">
        <x-navbar />

        <div class="flex-1 px-6 mt-8">
            <div class="w-full max-w-5xl mx-auto space-y-6">

                <!-- Top controls -->
                <div class="flex justify-between items-center">
                    <x-action-buttons>
                        <!-- Add Medicine Modal Trigger -->
                        <button onclick="document.getElementById('addModal').classList.remove('hidden')"
                            class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Obat</button>
                    </x-action-buttons>

                    <x-inventory.search-bar />
                </div>

                <!-- Medicine Table -->
                <x-inventory.table>
                    @foreach ($medicines as $med)
                        <x-inventory.table-row id="{{ $med->id }}" nama="{{ $med->name }}"
                            stok="{{ $med->stock_quantity }} pcs">
                            <button
                                onclick="openEditModal({{ $med->id }}, '{{ $med->name }}', {{ $med->stock_quantity }})"
                                class="bg-yellow-400 px-2 py-1 rounded text-white">Edit</button>

                            <form action="{{ route('inventory.destroy', $med->id) }}" method="POST"
                                onsubmit="return confirm('Hapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-2 py-1 rounded text-white">Hapus</button>
                            </form>
                        </x-inventory.table-row>
                    @endforeach
                </x-inventory.table>

            </div>
        </div>
    </div>

    <!-- Add Medicine Modal -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h2 class="text-lg font-bold mb-4">Tambah Obat</h2>
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-gray-700">Nama Obat</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700">Kategori</label>
                    <select name="category_id" class="w-full border rounded px-3 py-2" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700">Stok</label>
                    <input type="number" name="stock_quantity" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700">Tanggal Kedaluwarsa</label>
                    <input type="date" name="expiry_date" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700">Harga</label>
                    <input type="number" name="price" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')"
                        class="px-4 py-2 rounded border">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h2 class="text-lg font-bold mb-4">Edit Obat</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="block text-gray-700">Nama Obat</label>
                    <input type="text" name="name" id="editName" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700">Stok</label>
                    <input type="number" name="stock_quantity" id="editStock" class="w-full border rounded px-3 py-2"
                        required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')"
                        class="px-4 py-2 rounded border">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-yellow-400 text-white">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, name, stock) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editName').value = name;
            document.getElementById('editStock').value = stock;
            document.getElementById('editForm').action = '/inventory/' + id;
        }
>>>>>>> 6aa0144 (feat: implement functional inventory page, role system, and logs system  - added CRUD functionality for medicines - implemented role-based access (Admin/User) - integrated InventoryLog model to track user actions - added formatted change display on reports table - fixed authentication for logging user as Admin User - removed redundant queue types and old non-functional code)
    </script>
@endsection
