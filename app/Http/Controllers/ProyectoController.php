<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    // Validación de los campos requeridos
    private function rules(): array
    {
        return [
            'nombre'       => ['required','string','max:255'],
            'fecha_inicio' => ['required','date'],
            'estado'       => ['required','string','max:100'],
            'responsable'  => ['required','string','max:255'],
            'monto'        => ['required','numeric','min:0'],
        ];
    }

    // Controlador que crea un nuevo proyecto. Punto 1
    public function crear()
    {
        return view('proyectos.crear');
    }

    public function index()
    {
        // Lectura de la base de datos
        $proyectos = Proyecto::orderBy('id', 'asc')->get();
        // Lista los proyectos y como respuesta 200 y [] si no hay registros.
        if (request()->is('api/*')) {
            return response()->json($proyectos->values(), 200);
        }

        return view('proyectos.index', ['proyectos' => $proyectos->toArray()]);
    }
    
    // Recibe los datos del formulario de edición para actualizar información. Punto 3
    public function actualizar(Request $request, $id)
    {
        // Si el proyecto existe se guarda la info en la base de datos
        // $userId = auth()->id();

        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            if ($request->is('api/*')) {
                return response()->json(['message' => 'Proyecto no encontrado'], 404);
            }
            return redirect()->back()->withErrors('Proyecto no encontrado');
        }

        // Se verifican campos antes de actualizar
        $data = $request->validate($this->rules());

        $proyecto->update($data);

        if ($request->is('api/*')) {
            return response()->json($proyecto, 200);
        }

        return view('proyectos.actualizado', ['id' => $id, 'datos' => $data]);
    }

    // Muestra la vista simulando la eliminación del proyecto. Punto 4
    public function eliminar($id)
    {
        // Se modifica los datos estáticos por información de la base de datos
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }

        $proyecto->delete();
        return response()->noContent();
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
            return response()->json($proyecto, 200);
        }

        return view('proyectos.show', ['proyecto' => $proyectoArray]);
    }

    // Se crea proyecto por POST y se validan los campos. Retorna 201 con objeto creado.
    public function guardar(Request $request)
    {
        $data = $request->validate($this->rules());
        $proyecto = Proyecto::create([
            'nombre'       => $data['nombre'],
            'fecha_inicio' => $data['fecha_inicio'],
            'estado'       => $data['estado'],
            'responsable'  => $data['responsable'],
            'monto'        => $data['monto'],
            'created_by'   => auth('api')->id(),
        ]);

        if ($request->is('api/*')) {
            return response()->json($proyecto, 201);
        }

        return redirect()->back()->with('status', 'Proyecto creado correctamente');
    }

    // Muestra el formulario para editar un proyecto
    public function editar($id)
    {
        $proyecto = Proyecto::find($id);
        $proyectoArray = $proyecto ? $proyecto->toArray() : null;
        return view('proyectos.edit', ['proyecto' => $proyectoArray]);
    }

    // Métodos puente:

    // Se deriva a método guardar
    public function store(Request $request)
    {
        return $this->guardar($request);
    }

    // Se deriva a método actualizar
    public function update(Request $request, $id)
    {
        return $this->actualizar($request, $id);
    }

    // Se deriva a método eliminar
    public function destroy($id)
    {
        return $this->eliminar($id);
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