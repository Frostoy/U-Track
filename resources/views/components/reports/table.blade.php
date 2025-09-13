<div class="bg-teal-100 rounded-lg shadow overflow-hidden">
  <table class="w-full border-collapse">
    <thead class="bg-teal-200 text-left">
      <tr>
        <th class="p-3">Tanggal</th>
        <th class="p-3">Jenis</th>
        <th class="p-3">Barang</th>
        <th class="p-3">Jumlah</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      {{ $slot }}
    </tbody>
  </table>
</div>
