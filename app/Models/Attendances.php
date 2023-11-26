<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'bukti_kehadiran',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(teacher::class);
    }
}
