<?php
 
namespace App\Http\Controllers;

use App\Models\InventoryLog;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // STATISTICS
        $total = Medicine::count();
        $available = Medicine::where('stock_quantity', '>', 0)->count();
        $out = Medicine::where('stock_quantity', '<=', 0)->count();
        $expired = Medicine::whereDate('expiry_date', '<', Carbon::now())->count();

        $stats = [
            ['icon' => '💙', 'jumlah' => $total, 'label' => 'Total Barang'],
            ['icon' => '🟡', 'jumlah' => $available, 'label' => 'Barang Tersedia'],
            ['icon' => '🧡', 'jumlah' => $out,  'label' => 'Barang Habis'],
            ['icon' => '💜', 'jumlah' => $expired,  'label' => 'Obat Kadaluarsa'],
        ];

        // RECENT ACTIVITY - use InventoryLog entries
        $logs = InventoryLog::with('medicine')->latest()->take(6)->get();

        $recent = $logs->map(function (InventoryLog $log) {
            $kode = '#'.$log->item_id;
            $nama = $log->item_name ?? ($log->medicine->name ?? '-');

            $banyak = '-';
            $diff = null;

            if (is_array($log->changes)) {
                // created / deleted: changes is flat array with stock_quantity possibly present
                if (isset($log->changes['stock_quantity'])) {
                    $banyak = $log->changes['stock_quantity'];
                }

                // updated: structure ['old' => [...], 'new' => [...]]
                if (isset($log->changes['new']) && is_array($log->changes['new'])) {
                    // try to extract stock change
                    $new = $log->changes['new'];
                    $old = $log->changes['old'] ?? [];

                    if (isset($new['stock_quantity'])) {
                        $newVal = $new['stock_quantity'];
                        $oldVal = $old['stock_quantity'] ?? null;
                        if ($oldVal !== null) {
                            $diff = $newVal - $oldVal;
                            $banyak = abs($diff);
                        } else {
                            $banyak = $newVal;
                        }
                    }
                }
            }

            // determine action_type (in/out/neutral) and jenis (text label)
            $actionType = 'neutral';
            $jenis = 'Diubah';

            if ($log->action === 'created') {
                $actionType = 'in';
                $jenis = 'Masuk';
            } elseif ($log->action === 'deleted') {
                $actionType = 'out';
                $jenis = 'Keluar';
            } elseif ($log->action === 'updated') {
                if ($diff > 0) {
                    $actionType = 'in';
                } elseif ($diff < 0) {
                    $actionType = 'out';
                } else {
                    $actionType = 'neutral';
                }

                // descriptive summary for updates — prefer InventoryLog accessor but fall back to building one
                $formatted = $log->formatted_changes ?? null;

                if (! $formatted || $formatted === '-') {
                    $formattedPieces = [];
                    $changes = $log->changes;
                    if (is_array($changes) && isset($changes['old'], $changes['new'])) {
                        $ignored = ['updated_at', 'created_at', 'id'];
                        foreach ($changes['new'] as $key => $newValue) {
                            if (in_array($key, $ignored, true)) {
                                continue;
                            }
                            $oldValue = $changes['old'][$key] ?? null;
                            if ($oldValue != $newValue) {
                                if ($key === 'expiry_date') {
                                    $oldFmt = $oldValue ? Carbon::parse($oldValue)->format('d M Y') : 'null';
                                    $newFmt = $newValue ? Carbon::parse($newValue)->format('d M Y') : 'null';
                                    $formattedPieces[] = "Kadaluarsa: {$oldFmt} -> {$newFmt}";
                                } else {
                                    $formattedPieces[] = "Stok: {$oldValue} -> {$newValue}";
                                }
                            }
                        }
                    }

                    $formatted = $formattedPieces ? implode(', ', $formattedPieces) : 'Diubah';
                }

                // Build a short summary (first two changes) + full_changes for tooltip
                $parts = is_string($formatted) ? array_map('trim', explode(',', $formatted)) : [];
                if (empty($parts)) {
                    $short = 'Diubah';
                    $hasMore = false;
                } else {
                    $partsByComma = explode(', ', $formatted);
                    $shortParts = array_slice($partsByComma, 0, 2);
                    $short = implode(', ', $shortParts);
                    $hasMore = count($partsByComma) > count($shortParts);
                }

                $jenis = $short;
                $fullChanges = $formatted;
            }

            $tanggal = Carbon::parse($log->created_at)->format('d/m/Y');

            return [
                'kode' => $kode,
                'nama' => $nama,
                'banyak' => $banyak,
                'jenis' => $jenis,
                'full_changes' => $fullChanges ?? null,
                'has_more_changes' => $hasMore ?? false,
                'action_type' => $actionType,
                'tanggal' => $tanggal,
            ];
        })->toArray();

        // RESTOCK: low stock OR expiring within 30 days
        $threshold = 5; // default low-stock threshold
        $soon = Carbon::now()->addDays(30)->toDateString();

        $restockItems = Medicine::where(function ($q) use ($threshold, $soon) {
            $q->where('stock_quantity', '<=', $threshold)
              ->orWhere(function ($q2) use ($soon) {
                  $q2->whereNotNull('expiry_date')
                     ->whereDate('expiry_date', '<=', $soon);
              });
        })->orderBy('stock_quantity')->take(8)->get();

        $restock = $restockItems->map(function (Medicine $m) {
            $exp = '-';
            if ($m->expiry_date) {
                // compute days remaining (rounded down) relative to now so positive = days until expiry
                $expiryTs = Carbon::parse($m->expiry_date)->getTimestamp();
                $nowTs = Carbon::now()->getTimestamp();
                $diffSeconds = $expiryTs - $nowTs;

                $days = (int) floor($diffSeconds / 86400);

                if ($days < 0) {
                    $exp = 'Sudah kadaluarsa';
                } elseif ($days === 0) {
                    $exp = 'Hari ini';
                } else {
                    $exp = $days.' hari';
                }
            }

            return [
                'nama' => $m->name,
                'sisa' => $m->stock_quantity,
                'exp' => $exp,
            ];
        })->toArray();

        return view('dashboard.index', compact('stats', 'recent', 'restock'));
    }
}
 