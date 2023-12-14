<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetugasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // return $next($request);
          if (auth('petugas')->check() && auth('petugas')->user()->id_level == '2') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman lain atau lakukan sesuatu sesuai kebutuhan
        // return back()->with('error', 'Akses ditolak. Anda bukan admin.');
        abort(404);
    }
}
