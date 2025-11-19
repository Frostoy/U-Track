@php
    $id = $log->id;
    $user = $log->user;
    $aksi = ucfirst($log->action);
    $barang = $log->item_name;
    $tanggal = $log->created_at->format('Y-m-d H:i');

    $changesArray = is_string($log->changes) ? json_decode($log->changes, true) : $log->changes;
    $formattedChanges = [];

    if ($changesArray && isset($changesArray['old'], $changesArray['new'])) {
        if (isset($changesArray['old']['stock_quantity'], $changesArray['new']['stock_quantity'])) {
            $formattedChanges[] = "Stok {$changesArray['old']['stock_quantity']} -> {$changesArray['new']['stock_quantity']}";
        }

        if (isset($changesArray['old']['name'], $changesArray['new']['name'])) {
            $formattedChanges[] = "Nama '{$changesArray['old']['name']}' -> '{$changesArray['new']['name']}'";
        }
    }

    $formattedChanges = implode(', ', $formattedChanges);
@endphp

<tr class="border-b hover:bg-gray-50">
    <td class="py-3 px-4 text-sm text-gray-700">{{ $id }}</td>
    <td class="py-3 px-4 text-sm text-gray-700">{{ $user }}</td>
    <td class="py-3 px-4 text-sm text-gray-700">{{ $aksi }}</td>
    <td class="py-3 px-4 text-sm text-gray-700">{{ $barang }}</td>
    <td class="py-3 px-4 text-sm text-gray-700">{{ $formattedChanges }}</td>
    <td class="py-3 px-4 text-sm text-gray-700">{{ $tanggal }}</td>
</tr>
