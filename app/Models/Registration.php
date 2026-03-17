<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    protected $fillable = [
        'ref_code',
        'type',
        'program_id',
        'name',
        'phone',
        'email',
        'address',
        'gender',
        'dob',
        'last_education',
        'occupation',
        'mother_phone',
        'motivation',
        'photo',
        'message',
        'status',
        'admin_notes',
        'confirmed_at',
    ];

    protected function casts(): array
    {
        return [
            'dob' => 'date',
            'confirmed_at' => 'datetime',
        ];
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Generate ref code: NKM-YYYYMMDD-XXXXX
     */
    public static function generateRefCode(): string
    {
        $date = now()->format('Ymd');
        $lastReg = static::where('ref_code', 'like', "NKM-{$date}-%")
            ->orderByDesc('id')
            ->first();

        if ($lastReg) {
            $lastNumber = (int) substr($lastReg->ref_code, -5);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        return sprintf('NKM-%s-%05d', $date, $nextNumber);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
