@extends('layouts.app')

@section('title', 'Inventaris')

@section('content')
<div class="bg-[#9ea6ae] min-h-screen flex flex-col">
    <!-- Navbar -->
    <x-navbar />

    <!-- Content wrapper -->
    <div class="flex-1 px-6 mt-8">
        <div class="w-full max-w-5xl mx-auto space-y-6">
            
            <!-- Top controls -->
            <div class="flex justify-between items-center">
                <x-action-buttons />
                <x-inventory.search-bar />
            </div>

            <!-- Table -->
            <x-inventory.table>
                <x-inventory.table-row id="001" nama="Plester luka" stok="50 pcs" />
                <x-inventory.table-row id="002" nama="Betadine" stok="5 botol" />
                <x-inventory.table-row id="003" nama="Perban" stok="10 kotak" />
                <x-inventory.table-row id="004" nama="Antiseptik" stok="5 botol" />
                <x-inventory.table-row id="005" nama="Minyak kayu putih" stok="3 botol" />
                <x-inventory.table-row id="006" nama="Antangin" stok="10 sachet" />
                <x-inventory.table-row id="007" nama="Paracetamol" stok="15 pcs" />
                <x-inventory.table-row id="008" nama="Kotak P3K" stok="7 kotak" />
                <x-inventory.table-row id="009" nama="Kotak P3K" stok="7 kotak" />
                <x-inventory.table-row id="010" nama="Kotak P3K" stok="7 kotak" />
                <x-inventory.table-row id="011" nama="Kotak P3K" stok="7 kotak" />
                <x-inventory.table-row id="012" nama="Kotak P3K" stok="7 kotak" />
            </x-inventory.table>

        </div>
    </div>
</div>
@endsection
