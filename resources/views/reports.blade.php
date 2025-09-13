@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="bg-[#9ea6ae] min-h-screen flex flex-col">
  <!-- Navbar -->
  <x-navbar />

  <!-- Content wrapper -->
  <div class="flex-1 flex justify-center items-start px-6 pt-8">
    <div class="max-w-7xl w-full space-y-6">

      <!-- Page Header -->
      <x-reports.header />

      <!-- Report Cards -->
      <x-reports.cards />

      <!-- Report Table -->
      <x-reports.table>
        <x-reports.table-row tanggal="2025-09-01" jenis="Masuk" barang="Plester luka" jumlah="+20 pcs" />
        <x-reports.table-row tanggal="2025-09-03" jenis="Keluar" barang="Betadine" jumlah="-3 botol" />
        <x-reports.table-row tanggal="2025-09-05" jenis="Masuk" barang="Perban" jumlah="+10 kotak" />
      </x-reports.table>

    </div>
  </div>
</div>
@endsection
