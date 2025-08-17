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

    public function index()
    {
        // Lectura de la base de datos
        $proyectos = Proyecto::orderBy('id', 'asc')->get()->toArray();

        if (request()->is('api/*')) {
            return response()->json($proyectos);
        }

        return view('proyectos.index', ['proyectos' => $proyectos]);
    }
    
    // Recibe los datos del formulario de edición para actualizar información. Punto 3
    public function actualizar(Request $request, $id)
    {
        // Si el proyecto existe se guarda la info en la base de datos
        $userId = auth()->id();

        $proyecto = Proyecto::find($id);
        if ($proyecto) {
            $proyecto->update($request->only([
                'nombre',
                'fecha_inicio',
                'estado',
                'responsable',
                'monto'
            ]));
        }

        $datos = $request->all();
        return view('proyectos.actualizado', [
            'id' => $id,
            'datos' => $datos
        ]);
    }

    // Muestra la vista simulando la eliminación del proyecto. Punto 4
    public function eliminar($id)
    {
        // Se modifica los datos estáticos por información de la base de datos
        $proyecto = Proyecto::find($id);
        $proyectoArray = $proyecto ? $proyecto->toArray() : null;
        return view('proyectos.eliminado', ['proyecto' => $proyectoArray]);
    }
    // Método para mostrar proyecto por el id. Punto 5
    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        $proyectoArray = $proyecto ? $proyecto->toArray() : null;

        if (request()->is('api/*')) {
            if (!$proyecto) {
                return response()->json(['message' => 'Proyecto no encontrado'], 404);
            }
            return response()->json($proyectoArray);
        }

        return view('proyectos.show', ['proyecto' => $proyectoArray]);
    }

    // Se recibe los datos de creación del formulario
    public function guardar(Request $request)
    {
        $userId = auth('api')->id();
        Proyecto::create([
            'nombre'       => $request->nombre,
            'fecha_inicio' => $request->fecha_inicio,
            'estado'       => $request->estado,
            'responsable'  => $request->responsable,
            'monto'        => $request->monto,
            'created_by'   => $userId,
        ]);

        return response()->json(['message' => 'Proyecto creado correctamente']);
    }

    // Muestra el formulario para editar un proyecto
    public function editar($id)
    {
        $proyecto = Proyecto::find($id);
        $proyectoArray = $proyecto ? $proyecto->toArray() : null;
        return view('proyectos.edit', ['proyecto' => $proyectoArray]);
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