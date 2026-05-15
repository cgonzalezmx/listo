<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($request->user()->id)) {
            return redirect('/');
        }

        if (! config('settings.public_registration') && ! $request->hasValidSignature()) {
            abort(404);
        }

        return $next($request);
    }
}
