<div class="w-full max-w-5xl mx-auto bg-teal-100 rounded-lg shadow overflow-hidden">
  <table class="w-full border-collapse">
    <thead class="bg-teal-200 text-left">
      <tr>
        <th class="p-3">ID</th>
        <th class="p-3">Nama Barang</th>
        <th class="p-3">Stok Barang</th>
        <th class="p-3">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      {{ $slot }}
    </tbody>
  </table>
</div>
