<?php

namespace App\Http\Middleware\App;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        app()->setLocale(config('app.locale'));

        return $next($request);
    }
}
