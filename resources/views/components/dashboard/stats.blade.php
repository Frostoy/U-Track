<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    @foreach ($stats as $s)
    <div class="bg-white shadow-md rounded-xl p-6 flex items-center gap-4">
        <div class="text-4xl">{!! $s['icon'] !!}</div>
        <div>
            <div class="text-2xl font-bold">{{ $s['jumlah'] }}</div>
            <div class="text-gray-600 text-sm">{{ $s['label'] }}</div>
        </div>
    </div>
    @endforeach
</div>
