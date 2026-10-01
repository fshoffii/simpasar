<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lapak extends Model
{
    protected $fillable = [
        'pasar_id',
        'pedagang_id',
        'nomor_lapak',
        'blok',
        'ukuran',
        'jenis_usaha',
        'tarif_harian',
        'status',
        'qr_code_hash',
        'qrcode_path',
    ];

    public function pasar(): BelongsTo
    {
        return $this->belongsTo(Pasar::class);
    }

    public function pedagang(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pedagang_id');
    }
}