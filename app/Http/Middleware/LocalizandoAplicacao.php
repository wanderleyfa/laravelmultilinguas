<?php

namespace App\Http\Middleware;

use Closure;

class LocalizandoAplicacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::has('idioma'))
        {
            \App::setlocale(\Session::get('idioma'));
        }
        return $next($request);
    }
}
