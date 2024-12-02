<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory, UUIDAsPrimaryKey;

    protected $guarded = [];

    public function detailpengajuan(): HasMany
    {
        return $this->hasMany(DetailPengajuan::class);
    }
}
