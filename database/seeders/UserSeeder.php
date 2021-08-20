<?php

namespace Database\Seeders;

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
            'nip' => '2021150001',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => 'Arnold Armando Suwuh',
            'nip' => '2021155870',
            'email' => 'arnold@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user1->assignRole('Admin');
        $user2->assignRole('Pegawai');
    }
}
