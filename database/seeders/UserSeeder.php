<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        Pegawai::create([
            'nik' => '3578270810990002',
            'nip' => '2021155888',
            'jenis_kelamin' => 'Laki-laki',
            'golongan_darah' => 'O',
            'nomor_hp' => '081234567890',
            'status' => 'Aktif',
            'tanggal_lahir' => '1999-10-08',
            'users_id' => $user1->id,
        ]);

        $user2 = User::create([
            'name' => 'Arnold Armando Suwuh',
            'email' => 'arnold@gmail.com',
            'password' => Hash::make('password')
        ]);

        Pegawai::create([
            'nik' => '3578270512990001',
            'nip' => '2021155870',
            'jenis_kelamin' => 'Laki-laki',
            'golongan_darah' => 'O',
            'nomor_hp' => '081234567890',
            'status' => 'Aktif',
            'tanggal_lahir' => '1999-12-05',
            'users_id' => $user2->id,
        ]);

        $user1->assignRole('Admin');
        $user2->assignRole('Pegawai');
    }
}
