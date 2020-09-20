<?php

namespace App\Http\Middleware\App;

use Closure;

class RemoveCache {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $response = $next($request);
        $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                 ->header('Pragma','no-cache')
                 ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');

        return $response;
    }
}
