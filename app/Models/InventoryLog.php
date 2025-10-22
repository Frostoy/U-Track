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
            foreach ($this->changes['new'] as $key => $newValue) {
                $oldValue = $this->changes['old'][$key] ?? null;
                if ($oldValue != $newValue) {
                    $output[] = "$key: $oldValue → $newValue";
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
