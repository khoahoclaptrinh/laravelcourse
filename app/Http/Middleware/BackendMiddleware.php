<?php

namespace App\Http\Middleware;

use View;
use Closure;
use Illuminate\Http\Request;
use Auth;

class BackendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        if ( !Auth::guard('backend')->user() ) {
            return redirect(Route('backend.admin.login'));
        }
        return $next($request);

    }
}
