<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\Generacion;
use App\Models\Tarjeta;
use App\Models\Tipousuario;
use App\Models\Uni_ins;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*Estudiante::factory()->times(15)->create();
        Curso::factory()->times(8)->create()->each(
            function($curso){
                $curso->estudiantes()->sync(
                    Estudiante::all()->random(3)
                );
            }
        );
        */
        Tipousuario::create([
            'tipousuario'=>'ADMINISTRADOR'
        ]);
        Uni_ins::create([
            'nombre_uniins'=>'FACEBOL SRL'
        ]);
        Carrera::create([
            'nombre_carrera'=>'FACEBOL SRL'
        ]);
        Area::create([
            'nombre_area'=>'ADMINISTRADOR',
            'sigla' => 'ADM'
        ]);
        Generacion::create([
            'generacion'=>'0'
        ]);

        Usuario::create([
            'nombres'=>'administrador',
            'apellido1'=>'admi',
            'apellido2'=>'admi',
            'celular'=>'75227166',
            'direccion'=>'Zona Ballivian',
            'ci'=>'12345678',
            'extension'=>'LP',
            'f_nac'=>'2023-10-06',
            'email'=>'facebolsrl@gmail.com',
            'password'=> Hash::make(trim('facebol12345?')),
            'tipousuario_id'=>'1',
            'carrera_id'=>'1',
            'uniins_id'=>'1',
            'area_id'=>'1',
            'generacion_id' =>'1'
        ]);

        Tarjeta::create([
            'codigo_tarjeta'=>'xxxxx',
            'codigo_usuario'=>'ADM0001',
            'usuario_id'=>'1'
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
