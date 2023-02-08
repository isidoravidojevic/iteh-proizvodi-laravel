<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proizvods')->insert([
            'sifra' => 'Sifra3',
            'cena' => 35,
            'kolicina' => 45,
            'proizvodjac_id' => 1
        ]);
    }
}
