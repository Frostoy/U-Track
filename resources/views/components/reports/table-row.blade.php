<tr>
  <td class="p-3">{{ $tanggal }}</td>
  <td class="p-3">
    @if ($jenis === 'Masuk')
      <span class="text-green-600 font-semibold">{{ $jenis }}</span>
    @else
      <span class="text-red-600 font-semibold">{{ $jenis }}</span>
    @endif
  </td>
  <td class="p-3">{{ $barang }}</td>
  <td class="p-3">{{ $jumlah }}</td>
</tr>
