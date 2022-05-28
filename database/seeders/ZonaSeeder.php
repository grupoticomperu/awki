<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Zona;


class ZonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zona::create([
            'name'=>'Zona Norte'             
        ]);

        Zona::create([
            'name'=>'Zona Centro',            
        ]);

        Zona::create([
            'name'=>'Zona Sur'             
        ]);

        Zona::create([
            'name'=>'Zona Selva'            
        ]);

    }
}
