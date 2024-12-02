<?php

namespace App\Models;

use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    use HasFactory, UUIDAsPrimaryKey;

    protected $guarded = [];

    public function anggaran(): BelongsTo
    {
        return $this->belongsTo(Anggaran::class, 'anggaran_id');
    }

    public function kecamatan(): HasMany
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function realisasi(): BelongsTo
    {
        return $this->belongsTo(Realisasi::class);
    }
}
