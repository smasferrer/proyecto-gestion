<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio de Sesión</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-700 flex items-center justify-center min-h-screen">

  <div class="bg-gray-800 text-white rounded-2xl shadow-2xl p-8 md:p-12 w-full max-w-md">
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-cyan-400">Bienvenido</h1>
      <p class="text-gray-400 mt-2">Inicia sesión para continuar</p>
    </div>


    <div id="alerta" class="hidden mb-6 p-3 rounded-lg text-sm"></div>

    <form id="loginForm">
      <div class="mb-6 relative">
        <label for="email" class="block text-gray-300 text-sm font-semibold mb-2">Correo Electrónico</label>
        <div class="absolute inset-y-0 left-0 pl-3 pt-6 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
          </svg>
        </div>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="tucorreo@ejemplo.com"
          class="w-full pl-10 pr-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <div class="mb-6 relative">
        <label for="password" class="block text-gray-300 text-sm font-semibold mb-2">Contraseña</label>
        <div class="absolute inset-y-0 left-0 pl-3 pt-6 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3A5.25 5.25 0 0 0 12 1.5Zm-3.75 5.25a3.75 3.75 0 0 1 7.5 0v3a.75.75 0 0 1-1.5 0v-3a2.25 2.25 0 0 0-4.5 0v3a.75.75 0 0 1-1.5 0v-3Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="••••••••"
          class="w-full pl-10 pr-4 py-3 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300"
          required
        />
      </div>

      <div class="flex items-center justify-between mb-6">
        <label class="flex items-center">
          <input id="remember" name="remember" type="checkbox" class="h-4 w-4 bg-gray-700 border-gray-600 text-cyan-500 focus:ring-cyan-600 rounded">
          <span class="ml-2 block text-sm text-gray-300">Recordarme</span>
        </label>
        <div class="text-sm">
          <a href="#" class="font-medium text-cyan-400 hover:text-cyan-300">¿Olvidaste tu contraseña?</a>
        </div>
      </div>

      <button
        type="submit"
        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-cyan-500 transition-transform transform hover:scale-105 duration-300"
      >
        Iniciar Sesión
      </button>
    </form>

    <p class="mt-8 text-center text-sm text-gray-400">
      ¿No tienes una cuenta?
      <a href="/register" class="font-medium text-cyan-400 hover:text-cyan-300">Regístrate aquí</a>
    </p>
  </div>

  <script>
    const form = document.getElementById('loginForm');
    const alerta = document.getElementById('alerta');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      alerta.className = 'hidden';
      alerta.textContent = '';

      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;

      try {
        const res = await fetch('/api/login', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({ email, password })
        });

        const data = await res.json();

        if (!res.ok) {
          alerta.className = 'mb-6 p-3 rounded-lg text-sm bg-red-900/40 border border-red-700 text-red-200';
          alerta.textContent = data.error || 'La contraseña o correo electrónico son incorrectos';
          return;
        }

        localStorage.setItem('token', data.token);
        alerta.className = 'mb-6 p-3 rounded-lg text-sm bg-emerald-900/40 border border-emerald-700 text-emerald-200';
        alerta.textContent = 'Te has logueado correctamente.';

      } catch (err) {
        alerta.className = 'mb-6 p-3 rounded-lg text-sm bg-red-900/40 border border-red-700 text-red-200';
        alerta.textContent = 'Ha ocurrido un error. Por favor, inténtelo nuevamente o contáctese al 600 000 000 para asistencia.';
      }
    });
  </script>

</body>
</html>