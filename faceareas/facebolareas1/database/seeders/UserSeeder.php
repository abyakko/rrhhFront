<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'administrador',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin')
        ])->assignRole('Administrador');

        User::create([
            'name'=>'mauro',
            'email'=>'mauro@sistemas.com',
            'password'=>bcrypt('mauro')
            ])->assignRole('Administrador');

        User::create([
            'name'=>'abraham',
            'email'=>'abraham@sistemas.com',
            'password'=>bcrypt('abraham')
        ])->assignRole('Administrador');

        User::create([
            'name'=>'carla',
            'email'=>'carla@sistemas.com',
            'password'=>bcrypt('carla')
        ])->assignRole('Administrador');

        User::create([
            'name'=>'jherson',
            'email'=>'jherson@sistemas.com',
            'password'=>bcrypt('jherson')
        ])->assignRole('Administrador');
    }
}
