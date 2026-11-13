<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validasi dan buat pengguna baru (dipanggil Fortify saat POST /register).
     *
     * @param  array<string, mixed>  $input
     */
    public function create(array $input): User
    {
        // Catatan: form Simpasar tidak punya kolom konfirmasi kata sandi,
        // jadi aturan 'confirmed' sengaja tidak dipakai.
        Validator::make(
            $input,
            [
                'name'     => ['required', 'string', 'max:255'],
                'email'    => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
                'password' => ['required', 'string', Password::min(8)],
                'foto_ktp' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // maks 2 MB
            ],
            [
                'required'          => ':attribute Wajib diisi.',
                'email'             => 'Format Email tidak valid.',
                'unique'            => ':attribute Sudah terdaftar.',
                'min'               => ':attribute Minimal :min karakter.',
                'mimes'             => ':attribute Harus berupa file JPG, JPEG, PNG, atau PDF.',
                'foto_ktp.max'      => 'Ukuran :attribute Maksimal 2 MB.',
                'foto_ktp.uploaded' => ':attribute Gagal diunggah. Coba file lain.',
            ],
            [
                'name'     => 'Nama lengkap',
                'email'    => 'Email',
                'password' => 'Kata sandi',
                'foto_ktp' => 'Foto KTP',
            ]
        )->validate();

        // KTP = data pribadi sensitif -> simpan di disk privat (tidak bisa dibuka lewat URL publik).
        $pathKtp = $input['foto_ktp']->store('ktp', 'local');

        try {
            return DB::transaction(function () use ($input, $pathKtp) {
                $user = User::create([
                    'name'     => $input['name'],
                    'email'    => strtolower($input['email']),
                    'password' => $input['password'], 
                    'foto_ktp' => $pathKtp,
                ]);

                // Nama role harus sama persis dengan yang ada di tabel roles (Spatie).
                $user->assignRole('Pedagang');

                return $user;
            });
        } catch (\Throwable $e) {
            // Jangan sisakan file KTP yatim kalau pembuatan akun gagal.
            Storage::disk('local')->delete($pathKtp);
            throw $e;
        }
    }
}