@extends('layouts.app')

@section('title', 'Inventaris')

@section('content')
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
    </script>
@endsection
