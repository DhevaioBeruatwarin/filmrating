<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Memeriksa apakah pengguna memiliki role yang sesuai.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized access');
    }
}