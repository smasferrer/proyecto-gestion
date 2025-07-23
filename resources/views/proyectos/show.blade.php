<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Proyecto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-start justify-center">

    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md mt-36">
        <h1 class="text-2xl font-bold text-blue-800 mb-6 text-center">Detalle del Proyecto</h1>

        @if ($proyecto)
            <ul class="space-y-3 text-blue-900">
                <li><strong>ID:</strong> {{ $proyecto['id'] }}</li>
                <li><strong>Nombre:</strong> {{ $proyecto['nombre'] }}</li>
                <li><strong>Fecha de Inicio:</strong> {{ $proyecto['fecha_inicio'] }}</li>
                <li><strong>Estado:</strong> {{ $proyecto['estado'] }}</li>
                <li><strong>Responsable:</strong> {{ $proyecto['responsable'] }}</li>
                <li><strong>Monto:</strong> ${{ number_format($proyecto['monto'], 0, ',', '.') }}</li>
            </ul>
        @else
            <p class="text-red-600 font-semibold">Proyecto no encontrado.</p>
        @endif

        <div class="mt-6 text-center">
            <a href="/proyectos" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                ← Volver al listado
            </a>
        </div>
    </div>

</body>
</html>