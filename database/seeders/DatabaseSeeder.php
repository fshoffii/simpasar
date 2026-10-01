<?php

namespace Database\Seeders;

use App\Models\Pasar;
use App\Models\User;
use App\Models\Lapak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin
        User::create([
            'name' => 'Super Admin Dinas',
            'email' => 'admin@simpasar.go.id',
            'no_hp' => '081234567890',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
        ]);

        // 2. Sample Tenant Pasar
        $pasar = Pasar::create([
            'kode_pasar' => 'PSR-BLM',
            'nama_pasar' => 'Pasar Blambangan',
            'kecamatan' => 'Banyuwangi',
            'status' => 'aktif',
        ]);

        // 3. Admin Pasar
        User::create([
            'pasar_id' => $pasar->id,
            'name' => 'Admin Pasar Blambangan',
            'email' => 'blambangan@simpasar.go.id',
            'no_hp' => '081234567891',
            'password' => bcrypt('password'),
            'role' => 'admin_pasar',
        ]);

        // 4. Kolektor Lapangan
        $kolektor = User::create([
            'pasar_id' => $pasar->id,
            'name' => 'Budi (Kolektor)',
            'email' => 'kolektor@simpasar.go.id',
            'no_hp' => '081234567892',
            'password' => bcrypt('password'),
            'role' => 'kolektor',
        ]);

        // 5. Pedagang
        $pedagang = User::create([
            'pasar_id' => $pasar->id,
            'name' => 'Pak Ahmad (Pedagang)',
            'email' => 'pedagang@simpasar.go.id',
            'no_hp' => '081234567893',
            'password' => bcrypt('password'),
            'role' => 'pedagang',
        ]);

        // 6. Lapak Toko Pedagang
        Lapak::create([
            'pasar_id' => $pasar->id,
            'pedagang_id' => $pedagang->id,
            'nomor_lapak' => 'A-01',
            'jenis_usaha' => 'Sembako',
            'qr_code_hash' => Str::random(32),
            'tarif_harian' => 5000.00,
        ]);
    }
}