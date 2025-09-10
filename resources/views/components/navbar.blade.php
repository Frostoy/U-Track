<div class="w-full bg-gradient-to-b from-yellow-100 to-yellow-200">
  <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-center rounded-md">
    <div class="flex items-center justify-between px-5 py-3 w-full">
      <!-- Logo -->
      <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-lg bg-white shadow flex items-center justify-center">
          <svg viewBox="0 0 24 24" class="h-6 w-6">
            <path d="M4 7h16v10H4z" fill="none" stroke="currentColor" stroke-width="1.5"/>
            <path d="M7 14c2-3 4-3 6 0 1.5-2.2 3.5-2.2 5 0" stroke="currentColor" stroke-width="1.5" fill="none"/>
          </svg>
        </div>
        <div class="leading-tight">
          <div class="text-xs text-slate-500">U-Track</div>
        </div>
      </div>

      <!-- Nav + Search -->
      <div class="flex items-center gap-6">
        <nav class="hidden sm:flex items-center gap-8 text-[15px]">
          <a href="{{ route('dashboard') }}"
             class="{{ request()->routeIs('dashboard') ? 'font-semibold underline underline-offset-4 text-black' : 'text-gray-700 hover:underline' }}">
             Dashboard
          </a>
          <a href="{{ route('inventory') }}"
             class="{{ request()->routeIs('inventory') ? 'font-semibold underline underline-offset-4 text-black' : 'text-gray-700 hover:underline' }}">
             Inventaris
          </a>
          <a href="#"
             class="{{ request()->is('laporan*') ? 'font-semibold underline underline-offset-4 text-black' : 'text-gray-700 hover:underline' }}">
             Laporan
          </a>
          <a href="#"
             class="{{ request()->is('logout*') ? 'font-semibold underline underline-offset-4 text-black' : 'text-gray-700 hover:underline' }}">
             Logout
          </a>
        </nav>

        <!-- Search bar -->
        <div class="flex items-center gap-2 rounded-full bg-teal-200/60 px-3 py-1.5 w-[240px]">
          <input class="bg-transparent placeholder-gray-600 text-gray-700 text-sm w-full outline-none" placeholder="Cari barang..." />
          <button class="text-sm font-semibold bg-teal-400 hover:bg-teal-500 text-white rounded-full px-4 py-1">Cari</button>
        </div>
      </div>
    </div>
  </nav>
</div>
