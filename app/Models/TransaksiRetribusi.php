<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiRetribusi extends Model
{
    protected $fillable = [
        'pasar_id',
        'lapak_id',
        'kolektor_id',
        'nominal',
        'metode',
        'tanggal_bayar',
        'latitude',
        'longitude',
    ];

    public function pasar(): BelongsTo
    {
        return $this->belongsTo(Pasar::class);
    }

    public function lapak(): BelongsTo
    {
        return $this->belongsTo(Lapak::class);
    }

    public function kolektor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kolektor_id');
    }
}