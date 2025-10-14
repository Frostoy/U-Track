@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('content')
    @session('success')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endsession
    <div class="min-h-screen bg-[#ededed] flex">
        <x-sidebar />
 
        <div class="flex-1 p-6 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        @foreach ($stats as $s)
        <div class="bg-white shadow-md rounded-xl p-6 flex items-center gap-4">
            <div class="text-4xl">{{ $s['icon'] }}</div>
            <div>
                <div class="text-2xl font-bold">{{ $s['jumlah'] }}</div>
                <div class="text-gray-600 text-sm">{{ $s['label'] }}</div>
            </div>
        </div>
        @endforeach
    </div>
 
    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
 
        <!-- Data Terbaru -->
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
                            @if ($item['jenis'] === 'Masuk')
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Masuk</span>
                            @else
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">Keluar</span>
                            @endif
                        </td>
 
                        <td class="p-3">{{ $item['tanggal'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
 
        <!-- Restock Card -->
        <div class="bg-white shadow-md rounded-xl p-8">
            <h2 class="text-2xl font-semibold mb-4">Barang yang Perlu Distok</h2>
 
            <div class="space-y-4">
                @foreach ($restock as $r)
                <div class="p-4 border rounded-lg hover:bg-gray-50">
                    <div class="font-semibold text-gray-800">{{ $r['nama'] }}</div>
                    <div class="text-red-600 font-semibold">Sisa {{ $r['sisa'] }}</div>
                    <div class="text-gray-600 text-sm">Kadaluarsa dalam {{ $r['exp'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
 
    </div>
 
        </div>
    </div>
@endsection
