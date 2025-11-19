@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('content')
    <x-flash-success />

    <div class="min-h-screen bg-[#ededed] flex">
        <x-sidebar />

        <div class="flex-1 p-6 overflow-y-auto">
            <x-dashboard.stats :stats="$stats" />

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <x-dashboard.recent-table :recent="$recent" />
                <x-dashboard.restock-list :restock="$restock" />
            </div>
        </div>
    </div>
@endsection