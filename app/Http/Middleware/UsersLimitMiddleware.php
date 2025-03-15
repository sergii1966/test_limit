<?php

namespace App\Http\Middleware;

use App\Models\UsersLimit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersLimitMiddleware
{
    /**
     * Handle an incoming request.
     * Перевірка кількості аутентифікованих користувачів з заданоим часом активності
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth('web')->check()) {

            if (UsersLimit::query()
                    ->where('ip', $request->ip())
                    ->where('user_time', '>', time() - config('auth',)['check_time_activity_sec'])
                    ->count() > config('auth')['max_users_from_ip']) {

                if(app()->delusertime->delete()){

                    auth('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();

                    return redirect()->route('home')->with('error', 'Дуже багато залогінених юзерів!');

                }
            }
        }

        return $next($request);
    }
}
