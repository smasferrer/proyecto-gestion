<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto Eliminado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-start justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-blue-900 mt-36">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">Proyecto Eliminado (Simulado)</h1>

        <p class="text-center mb-4">Se ha simulado la eliminación del siguiente proyecto:</p>

        <ul class="space-y-2 text-center">
            <li><strong>ID:</strong> {{ $proyecto['id'] }}</li>
            <li><strong>Nombre:</strong> {{ $proyecto['nombre'] }}</li>
        </ul>

        <div class="mt-6 text-center">
            <a href="/proyectos" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                ← Volver al listado
            </a>
        </div>
    </div>

</body>
</html>