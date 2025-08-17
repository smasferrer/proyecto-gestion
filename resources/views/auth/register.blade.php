<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Registro de Usuario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-700 flex items-center justify-center min-h-screen">

  <div class="bg-gray-800 text-white rounded-2xl shadow-2xl p-8 md:p-12 w-full max-w-md">
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-cyan-400">Crear cuenta</h1>
      <p class="text-gray-400 mt-2">Regístrate para comenzar</p>
    </div>

    <form action="/api/register" method="POST">
      <div class="mb-6">
        <label for="name" class="block text-gray-300 text-sm font-semibold mb-2">Nombre</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Tu nombre"
          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <div class="mb-6">
        <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">Correo Electrónico</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="tucorreo@ejemplo.com"
          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <div class="mb-6">
        <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">Contraseña</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="••••••••"
          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <div class="mb-8">
        <label for="password_confirmation" class="block text-gray-300 text-sm font-semibold mb-2">Confirmar contraseña</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          placeholder="Repite tu contraseña"
          class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <button
        type="submit"
        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-cyan-500 transition-transform transform hover:scale-105 duration-300"
      >
        Registrarme
      </button>
    </form>

    <p class="mt-8 text-center text-sm text-gray-400">
      ¿Ya tienes una cuenta?
      <a href="/login" class="font-medium text-cyan-400 hover:text-cyan-300">
        Inicia sesión aquí
      </a>
    </p>
  </div>

</body>
</html>