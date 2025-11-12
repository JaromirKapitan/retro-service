<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanRegisterAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!str_ends_with($request->getHost(), '.test')) {
            abort(403, 'Registrace administrátora je povolena pouze na testovacím prostředí.');
        }

        return $next($request);
    }
}
