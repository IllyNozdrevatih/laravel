<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        //проверяем авторизован ли пользователь
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }
        return redirect('home');

    }
}
