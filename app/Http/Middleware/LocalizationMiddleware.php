<?php

namespace App\Http\Middleware;

use App\Enums\LangEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale(session()->get('locale') ?? LangEnum::getPrimary());

        return $next($request);
    }
}
