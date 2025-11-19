<tr class="border-b hover:bg-gray-50 medicine-row" data-name="{{ strtolower($med->name) }}"
    data-category="{{ strtolower($med->category->name ?? '') }}">
    <td class="py-3">{{ $med->id }}</td>
    <td class="py-3 font-medium">{{ $med->name }}</td>
    <td class="py-3">{{ $med->category->name ?? '-' }}</td>
    <td class="py-3">{{ $med->stock_quantity }} pcs</td>
    <td class="py-3">{{ \Carbon\Carbon::parse($med->expiry_date)->format('d M Y') }}</td>
    <td class="py-3">
        <div class="flex gap-2">
            <button
                onclick="openEditModal({{ $med->id }}, '{{ $med->name }}', {{ $med->category_id }}, {{ $med->stock_quantity }}, '{{ $med->expiry_date }}')"
                class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-white text-xs">
                Edit
            </button>
            <form action="{{ route('inventory.destroy', $med->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white text-xs">
                    Hapus
                </button>
            </form>
        </div>
    </td>
</tr>