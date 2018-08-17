<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = $request->user()->role()->first();

        if ($role->role_type_id == 1) {
            abort('401');
        }

        return $next($request);
    }
}
