<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Valor UF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-start justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-blue-900 mt-36">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">Valor de la UF Hoy</h1>

        @if ($valorUF)
            <p class="text-center text-lg">
                El valor de la UF hoy es:<br>
                <span class="text-2xl font-bold text-blue-700">
                    ${{ number_format($valorUF, 0, ',', '.') }}
                </span>
            </p>
        @else
            <p class="text-center text-red-600 font-semibold">
                No se pudo obtener el valor de la UF en este momento.
            </p>
        @endif

        <div class="mt-6 text-center">
            <a href="/proyectos" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                ← Volver al listado
            </a>
        </div>
    </div>

</body>
</html>