<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if ($request->user()->rol === 1)
        {
            // En caso de que no sea rol 2, redirigir a la página de inicio
            return redirect()->route('home');
        }

        return $next($request);
    }
}
