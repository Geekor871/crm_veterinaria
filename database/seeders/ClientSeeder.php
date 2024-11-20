<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'nombre' => 'Becker Espinoza',//Str::random(10),
            'telefono' => 8713983816,//rand(1000000000, 9999999999),
            'email' => 'becker.espinoza01rivera@gmail.com'//Str::random(10).'@utld.com',
        ]);
    }
}
