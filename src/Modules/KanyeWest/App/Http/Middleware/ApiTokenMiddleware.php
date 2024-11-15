<?php

namespace Modules\KanyeWest\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $bearerToken = $request->bearerToken();

        if ($bearerToken !== env('KANYE_API_TOKEN')) {
            return response()->json(['errors' => ['KanyeRest service is unavailable']], 401);
        }

        return $next($request);
    }
}
