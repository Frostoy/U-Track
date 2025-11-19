<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InventoryLog;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $medicine = Medicine::create($request->only([
            'name', 'category_id', 'stock_quantity', 'expiry_date', 'price',
        ]));

        InventoryLog::create([
            'user' => Auth::user()->username ?? 'System',
            'action' => 'created',
            'item_name' => $medicine->name,
            'item_id' => $medicine->id,
            'changes' => $medicine->toArray(),
        ]);

        return redirect()->route('inventory.index');
    }

    public function update(Request $request, Medicine $medicine)
    {
        $old = $medicine->getOriginal(); // BEFORE update
        $medicine->update($request->only([
            'name', 'category_id', 'stock_quantity', 'expiry_date', 'price',
        ]));
        $new = $medicine->getChanges(); // ONLY changed fields

        if (! empty($new)) {
            $oldChanged = array_intersect_key($old, $new); // match only changed keys
            InventoryLog::create([
                'user' => Auth::user()->username,
                'action' => 'updated',
                'item_name' => $medicine->name,
                'item_id' => $medicine->id,
                'changes' => ['old' => $oldChanged, 'new' => $new],
            ]);
        }

        return redirect()->route('inventory.index');
    }

    public function destroy(Medicine $medicine)
    {
        InventoryLog::create([
            'user' => Auth::user()->username ?? 'System',
            'action' => 'deleted',
            'item_name' => $medicine->name,
            'item_id' => $medicine->id,
            'changes' => $medicine->toArray(),
        ]);

        $medicine->delete();

        return redirect()->route('inventory.index');
    }

    public function index()
    {
        $medicines = Medicine::all();
        $categories = Category::all();

        return view('inventory.index', compact('medicines', 'categories'));
    }

    protected function formatChanges(array $changes): string
    {
        $output = [];

        // For create/delete, $changes might be flat
        if (isset($changes['old']) && isset($changes['new'])) {
            foreach ($changes['new'] as $key => $newValue) {
                $oldValue = $changes['old'][$key] ?? null;
                if ($oldValue != $newValue) {
                    $output[] = "$key: $oldValue → $newValue";
                }
            }
        } else {
            // For create, just show key: value
            foreach ($changes as $key => $value) {
                $output[] = "$key: $value";
            }
        }

        return implode(', ', $output);
    }
}
