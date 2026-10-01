<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
   
    // Tambahkan 'pasar_id', 'no_hp', dan 'role' ke dalam array $fillable yang sudah ada:
protected $fillable = [
    'pasar_id',
    'name',
    'email',
    'no_hp',
    'password',
    'role',
    
];

public function pasar()
{
    return $this->belongsTo(Pasar::class);
}
}
