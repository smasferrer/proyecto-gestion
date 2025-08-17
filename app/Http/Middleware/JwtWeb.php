<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token && $request->hasCookie('token')) {
            $token = $request->cookie('token');
        }

        if ($token) {
            try {
                $user = JWTAuth::setToken($token)->authenticate();
                if ($user) {
                    auth()->setUser($user); 
                    return $next($request);
                }
            } catch (JWTException $e) {
            }
        }

        return redirect('/login')->with('error', 'Debes iniciar sesión.');
    }
}
