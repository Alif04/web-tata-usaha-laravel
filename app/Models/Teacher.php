<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nomor_handphone',
        'nip',
        'jenis_kelamin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendances::class);
    }
}
