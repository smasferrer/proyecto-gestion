<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Proyecto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-xl text-blue-900">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">Crear Nuevo Proyecto</h1>

        <form action="/guardar" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold">Nombre:</label>
                <input type="text" name="nombre" class="w-full border border-blue-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-semibold">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" class="w-full border border-blue-300 rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">Estado:</label>
                <input type="text" name="estado" class="w-full border border-blue-300 rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">Responsable:</label>
                <input type="text" name="responsable" class="w-full border border-blue-300 rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">Monto:</label>
                <input type="number" name="monto" class="w-full border border-blue-300 rounded-md px-4 py-2">
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Guardar Proyecto
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <a href="/proyectos" class="text-blue-700 hover:underline">← Volver al listado</a>
        </div>
    </div>

</body>
</html>