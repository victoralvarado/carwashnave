<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //php artisan db:seed --class=ServiciosTableSeeder
        DB::table('servicios')->insert([
            [
                'descripcion_servicio' => 'Lavado exterior',
                'precio' => '9.00',
                'estado' => 'a',
            ],
            [
                'descripcion_servicio' => 'Lavado interior',
                'precio' => '8.00',
                'estado' => 'a',
            ],
            [
                'descripcion_servicio' => 'Encerado',
                'precio' => '9.00',
                'estado' => 'a',
            ],
        ]);
    }
}
