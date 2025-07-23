<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    // Controlador que crea un nuevo proyecto. Punto 1
    public function crear()
    {
        return view('proyectos.crear');
    }

    // Método para mostrar todos los proyectos creados u obtenidos. Punto 2
    public function index()
    {
        $proyectos = Proyecto::obtenerTodos();
        return view('proyectos.index', ['proyectos' => $proyectos]);
    }
    
    // Recibe los datos del formulario de edición para actualizar información. Punto 3
    public function actualizar(Request $request, $id)
    {
        $datos = $request->all();
        return view('proyectos.actualizado', [
            'id' => $id,
            'datos' => $datos
        ]);
    }

    // Muestra la vista simulando la eliminación del proyecto. Punto 4
    public function eliminar($id)
    {
        $proyecto = Proyecto::obtenerPorId($id);
        return view('proyectos.eliminado', ['proyecto' => $proyecto]);
    }
    // Método para mostrar proyecto por el id. Punto 5
    public function show($id)
    {
        $proyecto = Proyecto::obtenerPorId($id);
        return view('proyectos.show', ['proyecto' => $proyecto]);
    }

    // Recibe los datos del formulario de creación (simulado)
    public function guardar(Request $request)
    {
        $datos = $request->all();
        return view('proyectos.guardado', ['datos' => $datos]);
    }

    // Muestra el formulario para editar un proyecto
    public function editar($id)
    {
        $proyecto = Proyecto::obtenerPorId($id);
        return view('proyectos.edit', ['proyecto' => $proyecto]);
    }

    // Método para consumir la API externa y obtener el valor de la UF
    public function uf()
    {
        try {
            $respuesta = file_get_contents('https://mindicador.cl/api/uf');
            $data = json_decode($respuesta, true);
            $valorUF = $data['serie'][0]['valor'];
        } catch (\Exception $e) {
            $valorUF = null;
        }

        return view('proyectos.uf', ['valorUF' => $valorUF]);
    }
}