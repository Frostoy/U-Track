<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    protected $fillable = ['user', 'action', 'item_name', 'item_id', 'changes'];

    protected $casts = ['changes' => 'array'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'item_id');
    }

    // Accessor for formatted changes
    public function getFormattedChangesAttribute(): string
    {
        if (! $this->changes || ! is_array($this->changes)) {
            return '-';
        }

        // updated case
        if ($this->action === 'updated' && array_key_exists('old', $this->changes) && array_key_exists('new', $this->changes)) {
            $output = [];
            $ignored = ['updated_at', 'created_at', 'id'];
            foreach ($this->changes['new'] as $key => $newValue) {
                if (in_array($key, $ignored, true)) {
                    continue;
                }
                $oldValue = $this->changes['old'][$key] ?? null;
                if ($oldValue != $newValue) {
                    if ($key === 'expiry_date') {
                        $oldFmt = $oldValue ? \Carbon\Carbon::parse($oldValue)->format('d M Y') : 'null';
                        $newFmt = $newValue ? \Carbon\Carbon::parse($newValue)->format('d M Y') : 'null';
                        $output[] = "Kadaluarsa: $oldFmt → $newFmt";
                    } else {
                        $output[] = "$key: $oldValue → $newValue";
                    }
                }
            }

            return $output ? implode(', ', $output) : '-';
        }

        // create/delete case: just show all
        if (is_array($this->changes)) {
            $output = [];
            foreach ($this->changes as $key => $value) {
                $output[] = "$key: $value";
            }

            return $output ? implode(', ', $output) : '-';
        }

        return '-';
    }
}
