@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @session('success')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endsession
    <div class="min-h-screen bg-[#9ea6ae] flex flex-col">
        <x-navbar />

        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 px-6 mt-6">
            Selamat datang di dashboard, Admin!
        </h1>

        <div class="flex flex-wrap justify-center gap-6 px-6 mb-6 flex-grow">
            <!-- Left Column -->
            <div class="flex flex-col flex-1 max-w-md min-h-[600px] space-y-6">
                <x-dashboard.stat-card />

                <!-- Stock list grows to fill remaining height -->
                <div class="flex-grow">
                    <x-dashboard.stock-list class="h-full" />
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6 flex flex-col flex-[2] min-h-[600px]">
                <!-- Make chart wider -->
                <div class="bg-white rounded-lg p-6 shadow-md w-full h-[350px]">
                    <canvas id="inventoryChart" class="w-full h-full"></canvas>
                </div>

                <div class="flex gap-4 flex-wrap">
                    <x-dashboard.pull-down-card title="Riwayat Terbaru" contentId="historyContent" :items="[
                        '12/08 : + Kotak P3K (5 unit)',
                        '14/08 : - Paracetamol (3 strip)',
                        '15/08 : - Alkohol (2 botol)',
                        '16/08 : + Masker (20 pcs)',
                    ]"
                        bg="bg-teal-300" innerBg="bg-teal-200/80" class="flex-1 min-w-[300px]" />
                    <x-dashboard.pull-down-card title="Notifikasi" contentId="notifContent" :items="['Stok Paracetamol tinggal 3', 'Perban habis, perlu restock']"
                        bg="bg-yellow-400" innerBg="bg-yellow-200/80" class="flex-1 min-w-[300px]" />
                </div>
            </div>
        </div>

        <!-- Fixed action buttons at bottom right -->
        <div class="fixed bottom-6 right-6 flex gap-4 bg-[#9ea6ae] p-4 rounded-lg shadow-lg z-50">
            <x-action-buttons />
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function setupPullDown(triggerSelector, contentSelector) {
            const triggers = document.querySelectorAll(triggerSelector);
            triggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const content = document.querySelector(contentSelector);
                    if (content.classList.contains('max-h-0')) {
                        content.classList.remove('max-h-0');
                        content.classList.add('max-h-96');
                    } else {
                        content.classList.remove('max-h-96');
                        content.classList.add('max-h-0');
                    }
                });
            });
        }
        setupPullDown('[data-target="#historyContent"]', '#historyContent');
        setupPullDown('[data-target="#notifContent"]', '#notifContent');

        const ctx = document.getElementById('inventoryChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Alat', 'Obat', 'Lain'],
                datasets: [{
                    label: 'Jumlah (%)',
                    data: [30, 50, 20],
                    backgroundColor: ['#fde68a', '#86efac', '#fca5a5'],
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
