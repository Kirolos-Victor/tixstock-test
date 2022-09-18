<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BearerToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken() !== env('BEARER_TOKEN')) {
            return response()->json('Unauthorized User', 401);
        }
        return $next($request);
    }
}
