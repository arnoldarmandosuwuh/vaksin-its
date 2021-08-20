<?php

namespace Database\Seeders;

use App\Models\Vaksinator;
use Illuminate\Database\Seeder;

class VaksinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaksinator::create([
            'nama' => 'RSUD Dr. Soetomo',
        ]);

        Vaksinator::create([
            'nama' => 'RSU Haji',
        ]);

        Vaksinator::create([
            'nama' => 'Puskesmas Keputih',
        ]);
    }
}
