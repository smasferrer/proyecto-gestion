<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Página de Inicio</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-700 flex items-center justify-center min-h-screen">

  <div class="bg-gray-800 text-white rounded-2xl shadow-2xl p-8 md:p-12 w-full max-w-2xl">
    <!-- Encabezado -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-cyan-400">Gestión de Proyectos</h1>
      <p class="text-gray-400 mt-2">Bienvenido a tu panel. Elige cómo quieres continuar.</p>
    </div>

    <!-- Acciones principales -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- Tarjeta Login -->
      <a href="{{ route('login') }}"
         class="group block bg-gray-700 border border-gray-600 rounded-xl p-6 transition-all hover:border-cyan-400 hover:shadow-lg hover:-translate-y-0.5">
        <div class="flex items-center gap-3 mb-2">
          <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-cyan-600/20">
            <!-- icono candado -->
            <svg class="h-6 w-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3A5.25 5.25 0 0 0 12 1.5Zm-3.75 5.25a3.75 3.75 0 0 1 7.5 0v3a.75.75 0 0 1-1.5 0v-3a2.25 2.25 0 0 0-4.5 0v3a.75.75 0 0 1-1.5 0v-3Z" clip-rule="evenodd"/>
            </svg>
          </div>
          <h2 class="text-xl font-semibold text-white">Iniciar Sesión</h2>
        </div>
        <p class="text-gray-400 text-sm">Accede con tu cuenta para gestionar tus proyectos.</p>
        <span class="inline-flex items-center gap-1 mt-4 text-cyan-400 group-hover:text-cyan-300">
          Ir al login
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 10a1 1 0 0 1 1-1h7.586L10.293 6.707a1 1 0 1 1 1.414-1.414l4.0 4.0a1 1 0 0 1 0 1.414l-4.0 4.0a1 1 0 1 1-1.414-1.414L12.586 11H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
          </svg>
        </span>
      </a>

      <!-- Tarjeta Registro -->
      <a href="{{ route('register') }}"
         class="group block bg-gray-700 border border-gray-600 rounded-xl p-6 transition-all hover:border-cyan-400 hover:shadow-lg hover:-translate-y-0.5">
        <div class="flex items-center gap-3 mb-2">
          <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-cyan-600/20">
            <!-- icono usuario -->
            <svg class="h-6 w-6 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 2.25a4.5 4.5 0 0 0-4.5 4.5v.75a4.5 4.5 0 1 0 9 0v-.75a4.5 4.5 0 0 0-4.5-4.5ZM4.5 20.625a7.5 7.5 0 0 1 15 0A.375.375 0 0 1 19.125 21H4.875a.375.375 0 0 1-.375-.375Z" clip-rule="evenodd"/>
            </svg>
          </div>
          <h2 class="text-xl font-semibold text-white">Crear Cuenta</h2>
        </div>
        <p class="text-gray-400 text-sm">Regístrate para comenzar a crear y administrar proyectos.</p>
        <span class="inline-flex items-center gap-1 mt-4 text-cyan-400 group-hover:text-cyan-300">
          Ir al registro
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 10a1 1 0 0 1 1-1h7.586L10.293 6.707a1 1 0 1 1 1.414-1.414l4.0 4.0a1 1 0 0 1 0 1.414l-4.0 4.0a1 1 0 1 1-1.414-1.414L12.586 11H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
          </svg>
        </span>
      </a>
    </div>

    <!-- Accesos rápidos secundarios -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
      <a href="/proyectos" class="block text-center bg-gray-700 border border-gray-600 rounded-xl p-4 hover:border-cyan-400 hover:shadow-lg transition">
        Listado de Proyectos
      </a>
      <a href="/crear" class="block text-center bg-gray-700 border border-gray-600 rounded-xl p-4 hover:border-cyan-400 hover:shadow-lg transition">
        Crear Proyecto
      </a>
      <a href="/uf" class="block text-center bg-gray-700 border border-gray-600 rounded-xl p-4 hover:border-cyan-400 hover:shadow-lg transition">
        Valor UF Hoy
      </a>
    </div>

    <!-- Pie -->
    <p class="mt-8 text-center text-sm text-gray-400">
      Tip: también puedes probar la API con JWT desde Postman.
    </p>
  </div>

</body>
</html>