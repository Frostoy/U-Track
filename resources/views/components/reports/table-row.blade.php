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

<tr>
    <td class="p-3">{{ $id }}</td>
    <td class="p-3">{{ $user }}</td>
    <td class="p-3">{{ $aksi }}</td>
    <td class="p-3">{{ $barang }}</td>
    <td class="p-3">{{ $formattedChanges }}</td>
    <td class="p-3">{{ $tanggal }}</td>
</tr>
