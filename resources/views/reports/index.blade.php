@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="bg-[#9ea6ae] min-h-screen flex flex-col">
        <x-navbar />

        <div class="flex-1 flex justify-center items-start px-6 pt-8">
            <div class="max-w-7xl w-full space-y-6">
                <x-reports.header />
                <x-reports.cards />

                <x-reports.table>
                    @foreach ($logs as $log)
                        <x-reports.table-row :log="$log" />
                    @endforeach
                </x-reports.table>
                <div class="mt-4">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
