<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetUserTimeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
    ): Response
    {
        if (auth('web')->check()){
            if(!app()->setusertime->createOrUpdate()){
                auth('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->intended()->with('error', 'Щось пішло не так!');
            }
        }

        return $next($request);
    }
}
