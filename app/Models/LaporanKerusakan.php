<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKerusakan extends Model
{
    protected $fillable = [
        'pasar_id',
        'lapak_id',
        'pedagang_id',
        'judul_laporan',
        'deskripsi',
        'foto_path',
        'status',
        'tanggapan_admin',
    ];

    public function pasar(): BelongsTo
    {
        return $this->belongsTo(Pasar::class);
    }

    public function lapak(): BelongsTo
    {
        return $this->belongsTo(Lapak::class);
    }

    public function pedagang(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pedagang_id');
    }
}