<div class="w-64 bg-[#0f172a] text-white flex flex-col p-5">
    <div class="flex items-center mb-8">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="U-Track" class="w-10 h-10 mr-3">
            <h4 class="text-xl font-semibold">U-Track</h4>
        </a>
    </div>

    <nav class="flex flex-col gap-2">
        {{-- Dashboard Link --}}
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-3 py-2 rounded-lg 
            {{ request()->routeIs('dashboard') ? 'bg-[#1e293b]' : 'hover:bg-[#1e293b]' }}">
            <span>📊 Dashboard</span>
        </a>

        {{-- Inventaris Link --}}
        {{-- Note: We check if the route name STARTS with 'inventory.' for nested routes like inventory.create or inventory.edit --}}
        <a href="{{ route('inventory.index') }}"
            class="flex items-center px-3 py-2 rounded-lg 
            {{ request()->routeIs('inventory.*') ? 'bg-[#1e293b]' : 'hover:bg-[#1e293b]' }}">
            <span>📦 Inventaris</span>
        </a>

        {{-- Laporan Link --}}
        {{-- Note: We check if the route name STARTS with 'reports.' --}}
        <a href="{{ route('reports.index') }}"
            class="flex items-center px-3 py-2 rounded-lg 
            {{ request()->routeIs('reports.*') ? 'bg-[#1e293b]' : 'hover:bg-[#1e293b]' }}">
            <span>📋 Laporan</span>
        </a>
    </nav>

    <div class="mt-auto pt-5 border-t border-gray-600 space-y-2">
        <div class="flex items-center gap-2 bg-[#1e293b] p-3 rounded-lg">
            <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center text-xs">
                {{ strtoupper(substr(Auth::user()->username ?? 'AD', 0, 2)) }}
            </div>
            <div>
                <p class="text-sm font-medium">{{ Auth::user()->username ?? 'Admin' }}</p>
            </div>
        </div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="flex items-center justify-center gap-2 px-3 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition">
            <span>🚪 Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        
    </div>
</div>
