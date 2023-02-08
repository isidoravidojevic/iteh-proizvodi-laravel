<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProizvodjacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proizvodjacs')->insert([
            'naziv' => 'Naziv2',
            'adresa' => 'Adresa1',
            'email' => 'Email1',
        ]);
    }
}
