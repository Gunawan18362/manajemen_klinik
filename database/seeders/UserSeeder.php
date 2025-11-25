<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        $pasien1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'pasien@gmail.com',
            'password' => Hash::make('pasien123'),
            'role' => 'pasien'
        ]);

        Pasien::create([
            'user_id'       => $pasien1->id,
            'alamat'        => 'Jl. Mawar No. 123',
            'no_hp'         => '08123456789',
            'tanggal_lahir' => '1995-05-10',
        ]);
    }
}
