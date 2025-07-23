<?php

namespace App\Models;

class Proyecto
{
    //Datos estáticos para simular registros de proyectos
    private static $listaProyectos = [
        [
            'id' => 1,
            'nombre' => 'Arriendo de gatos',
            'fecha_inicio' => '1986-04-20',
            'estado' => 'En Proceso',
            'responsable' => 'Loretto Herrera',
            'monto' => 4500000,
        ],
        [
            'id' => 2,
            'nombre' => 'Venta de guitarras',
            'fecha_inicio' => '2024-06-15',
            'estado' => 'Completado',
            'responsable' => 'Sebastián Masferrer',
            'monto' => 3000000,
        ]
    ];

    // Se obtienen todos los proyectos dentro de la tabla
    public static function obtenerTodos()
    {
        return self::$listaProyectos;
    }

    // Se retorna un proyecto por el ID
    public static function obtenerPorId($id)
    {
        foreach (self::$listaProyectos as $proyecto) {
            if ($proyecto['id'] == $id) {
                return $proyecto;
            }
        }
        return null;
    }
}