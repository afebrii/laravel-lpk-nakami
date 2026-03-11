<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'curriculum',
        'duration',
        'schedule',
        'quota',
        'price',
        'is_free',
        'thumbnail',
        'facilities',
        'requirements',
        'meta_title',
        'meta_description',
        'status',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_free' => 'boolean',
            'quota' => 'integer',
            'order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'category_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeByCategory($query, string $type)
    {
        return $query->whereHas('category', fn($q) => $q->where('type', $type));
    }

    /**
     * Format harga untuk tampilan
     */
    public function getFormattedPriceAttribute(): string
    {
        if ($this->is_free) {
            return 'GRATIS';
        }

        return 'Rp ' . number_format((float) $this->price, 0, ',', '.');
    }
}
