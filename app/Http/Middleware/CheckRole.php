<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request and ensure the user has one of the allowed roles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
    * @param  string  ...$roles  Allowed roles (variadic list)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Validasi status otentikasi serta kepemilikan role 
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses Ditolak! Anda tidak memiliki wewenang menuju halaman ini.');
        }

        return $next($request);
    }
}