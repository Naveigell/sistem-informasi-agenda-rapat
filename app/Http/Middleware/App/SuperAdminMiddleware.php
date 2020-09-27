<?php

namespace App\Http\Middleware\App;

use Closure;
use Illuminate\Http\Response;

class SuperAdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $user = auth('user');
        if ($user->check()) {

            return $next($request);
        } else {
            return new Response(view('errors.404'));
        }
    }
}
