<div class="bg-white shadow-md rounded-xl p-8">
    <h2 class="text-2xl font-semibold mb-4">Barang yang Perlu Distok</h2>

    <div class="space-y-4">
        @foreach ($restock as $r)
        <div class="p-4 border rounded-lg hover:bg-gray-50">
            <div class="font-semibold text-gray-800">{{ $r['nama'] }}</div>
            <div class="text-red-600 font-semibold">Sisa {{ $r['sisa'] }}</div>
            <div class="text-gray-600 text-sm">
                @if (isset($r['exp']) && $r['exp'] === 'Sudah kadaluarsa')
                    {{ $r['exp'] }}
                @elseif(isset($r['exp']) && $r['exp'] === 'Hari ini')
                    Kadaluarsa hari ini
                @elseif(isset($r['exp']) && $r['exp'] !== '-')
                    Kadaluarsa dalam {{ $r['exp'] }}
                @else
                    -
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
