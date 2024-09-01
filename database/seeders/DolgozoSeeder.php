<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DolgozoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dolgozok')->insert([
            [
                'nev' => 'Kovács János',
                'pozicio' => 'Fejlesztő',
                'vegzettseg' => 'BSc Informatika',
                'szuletesi_ido' => '1990-01-01',
                'fizetes' => 500000,
                'mikor_kezdett' => '2024-01-01',
                'cipomeret' => 42,
                'ruhameret' => 'L',
                'tort_szam' => 1.5,
                'megjegyzes' => 'Nincs megjegyzés',
            ],
        ]);
    }
}
