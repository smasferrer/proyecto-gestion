<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Proyectos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-start justify-center">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-4xl mt-36">
        <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">Listado de Proyectos</h1>

        <table class="w-full border border-blue-200 rounded overflow-hidden shadow">
            <thead class="bg-blue-200 text-blue-900">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Nombre</th>
                    <th class="py-2 px-4 text-left">Fecha de Inicio</th>
                    <th class="py-2 px-4 text-left">Estado</th>
                    <th class="py-2 px-4 text-left">Responsable</th>
                    <th class="py-2 px-4 text-left">Monto</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-blue-100">
                @foreach ($proyectos as $proyecto)
                    <tr class="hover:bg-blue-50 transition-colors cursor-pointer">
                        <td class="py-2 px-4">{{ $proyecto['id'] }}</td>
                        <td class="py-2 px-4">{{ $proyecto['nombre'] }}</td>
                        <td class="py-2 px-4">{{ $proyecto['fecha_inicio'] }}</td>
                        <td class="py-2 px-4">{{ $proyecto['estado'] }}</td>
                        <td class="py-2 px-4">{{ $proyecto['responsable'] }}</td>
                        <td class="py-2 px-4">${{ number_format($proyecto['monto'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>