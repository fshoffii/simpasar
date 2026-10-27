<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $roles = ["admin","kolektor","pedagang"];
        foreach($roles as $role){
            Role::firstOrCreate(['name' => $role]);
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@simpasar.com',
            'password' => 'admin123',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole($roles[0]);
        User::create([
            'name' => 'pedagang',
            'email' => 'pedagang@simpasar.com',
            'password' => 'pedagang123',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole($roles[2]);
        User::create([
            'name' => 'kolektor',
            'email' => 'kolektor@simpasar.com',
            'password' => 'kolektor123',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole($roles[1]);
    }
}
