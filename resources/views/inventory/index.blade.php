@extends('layouts.app')

@section('title', 'Inventaris')

@section('content')
    <div class="flex h-screen bg-gray-100">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Inventaris UKS</h2>
                <div class="flex gap-3">
                    <input type="text" id="searchBar" placeholder="Cari obat..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <button onclick="openAddModal()"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition">
                        + Tambah Obat
                    </button>
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
    </script>
@endsection
