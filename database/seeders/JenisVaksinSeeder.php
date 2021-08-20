<?php

namespace Database\Seeders;

use App\Models\JenisVaksin;
use Illuminate\Database\Seeder;

class JenisVaksinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisVaksin::create([
            'nama' => 'Sinovac',
        ]);

        JenisVaksin::create([
            'nama' => 'AstraZeneca',
        ]);

        JenisVaksin::create([
            'nama' => 'Pfizer',
        ]);
    }
}
