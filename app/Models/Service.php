<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'short_description',
        'price_start',
        'price_end',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'price_start' => 'decimal:2',
            'price_end' => 'decimal:2',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Format harga untuk tampilan
     */
    public function getFormattedPriceAttribute(): string
    {
        if ($this->price_end) {
            return 'Rp ' . number_format((float) $this->price_start, 0, ',', '.') .
                ' - Rp ' . number_format((float) $this->price_end, 0, ',', '.');
        }

        return 'Rp ' . number_format((float) $this->price_start, 0, ',', '.');
    }
}
