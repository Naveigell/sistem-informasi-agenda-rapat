<?php

namespace App\Http\Middleware\App;

use Illuminate\Http\Response;
use App\Traits\Routes;
use Closure;

class UserMiddleware {
    use Routes;
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
            if ($this->permitted($user->role(), $request->path())) {
                return $next($request);
            }
            else {
                return new Response(view('errors.404'));
            }
        }
        else {
            return new Response(view('errors.404'));
        }
    }
}
