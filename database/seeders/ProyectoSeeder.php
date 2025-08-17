<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\User;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'administrador')->first();
        $maria = User::where('email', 'smasferrer@alumnos.ipss.cl')->first();

        if ($admin) {
            Proyecto::updateOrCreate(
                ['nombre' => 'Arriendo de gatos'],
                [
                    'fecha_inicio' => '1986-04-20',
                    'estado' => 'En Proceso',
                    'responsable' => 'Loretto Herrera',
                    'monto' => 4500000.00,
                    'created_by' => $admin->id,
                ]
            );
        }

        if ($maria) {
            Proyecto::updateOrCreate(
                ['nombre' => 'Venta de guitarras'],
                [
                    'fecha_inicio' => '2024-06-15',
                    'estado' => 'Completado',
                    'responsable' => 'Sebastián Masferrer',
                    'monto' => 3000000.00,
                    'created_by' => $maria->id,
                ]
            );
        }
    }
}
