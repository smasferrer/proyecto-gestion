<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario principal para probar en el login
        User::updateOrCreate(
            ['email' => 'Administrador'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456789'),
            ]
        );

        //Usuario secundario de ejemplo
        User::updateOrCreate(
            ['email' => 'smasferrer@alumnos.ipss.cl'],
                [
                    'name'=> 'Sebastian Masferrer',
                    'password' => Hash::make('123456789'),
                ]
        );
    }
}
