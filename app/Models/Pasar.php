<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasar extends Model
{
    protected $fillable = [
        'kode_pasar',
        'nama_pasar',
        'kecamatan',
        'status',
        //'email',
       //'website',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function lapaks() : HasMany
    {
        return $this->hasMany(Lapak::class);
    }
}
