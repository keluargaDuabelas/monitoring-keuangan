<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\PengajuanObserver;

class Pengajuan extends Model
{
    use HasFactory, UUIDAsPrimaryKey;

    protected $guarded = [];

    public function detailPengajuans(): HasMany
    {
        return $this->hasMany(DetailPengajuan::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }


    public function getTotalJumlahAttribute()
{
    return $this->detailPengajuans()->sum('jumlah');
}
// Event lifecycle untuk memanipulasi anggaran



}
