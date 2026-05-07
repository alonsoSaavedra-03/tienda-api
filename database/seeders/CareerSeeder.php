<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Career::create(['name' => 'Desarrollador de Software']);
        Career::create(['name' => 'Diseño Grafico']);
        Career::create(['name' => 'Administracion Industrial']);
        Career::create(['name' => 'Ingenieria de Sistemas']);
        Career::create(['name' => 'Marketing Digital']);
        Career::create(['name' => 'Contabilidad']);
        Career::create(['name' => 'Arquitectura']);
        Career::create(['name' => 'Psicologia']);
        Career::create(['name' => 'Ingenieria Civil']);
        Career::create(['name' => 'Derecho']);
    }
}
