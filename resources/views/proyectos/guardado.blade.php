<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto Guardado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-lg text-blue-900">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">Proyecto Recibido</h1>

        <p class="mb-4 text-center">Los datos enviados fueron:</p>

        <ul class="space-y-2">
            @foreach ($datos as $campo => $valor)
                <li>
                    <strong>{{ ucfirst($campo) }}:</strong> {{ $valor }}
                </li>
            @endforeach
        </ul>

        <div class="mt-6 text-center">
            <a href="/proyectos" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                ← Volver al listado
            </a>
        </div>
    </div>

</body>
</html>