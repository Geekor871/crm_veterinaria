<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petId = DB::table('pets')->inRandomOrder()->value('id');

        if ($petId) {
            DB::table('appointments')->insert([
                'fecha_hora' => Carbon::now(),
                'Motivo' => Str::random(10),
                'Observaciones' => Str::random(10),
                'pet_id' => $petId
            ]);
        } 
        else {
            // Si no hay registros en la tabla pets, muestra un mensaje
            $this->command->info('No se encontraron registros en la tabla "pets".');
        }
    
        // DB::table('appointments')->insert([
        //     'fecha_hora' => Carbon::now(),
        //     'Motivo' => Str::random(10),
        //     'Observaciones' => Str::random(10),
        //     'pet_id' => $petId
        // ]);
    }
}
