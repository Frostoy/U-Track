<div class="col-span-2 bg-white shadow-md rounded-xl p-8">

    <h2 class="text-2xl font-semibold mb-4">Data Terbaru</h2>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-gray-600">
                <th class="p-3">Kode Barang</th>
                <th class="p-3">Nama Barang</th>
                <th class="p-3">Banyak</th>
                <th class="p-3">Jenis</th>
                <th class="p-3">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($recent as $item)
            <tr>
                <td class="p-6">{{ $item['kode'] }}</td>
                <td class="p-3">{{ $item['nama'] }}</td>
                <td class="p-3">{{ $item['banyak'] }}</td>

                <td class="p-3">
                    @if (isset($item['action_type']) && $item['action_type'] === 'in')
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Masuk</span>
                    @elseif (isset($item['action_type']) && $item['action_type'] === 'out')
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">Keluar</span>
                    @else
                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Diubah</span>
                    @endif

                    @php
                        $showDesc = isset($item['jenis']) && $item['jenis'] !== '-' && $item['jenis'] !== '' && !in_array($item['jenis'], ['Masuk', 'Keluar']);
                    @endphp

                    @if ($showDesc)
                        <div class="text-sm text-gray-600 mt-1" @if(!empty($item['full_changes'])) title="{{ $item['full_changes'] }}" @endif>
                            {{ $item['jenis'] }}@if(!empty($item['has_more_changes']) && $item['has_more_changes'])&hellip;@endif
                        </div>
                    @endif
                </td>

                <td class="p-3">{{ $item['tanggal'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
