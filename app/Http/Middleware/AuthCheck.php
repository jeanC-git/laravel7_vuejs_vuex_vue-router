<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;


class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Log::info('AuthCheck middleware');
        if (!Auth::check()) {
            // return redirect('/login');
            return response()->json([
                'msg' => 'A message from middleware'
            ], 404);
        }
        $user = Auth::user();
        if ($user->hasRole('usuario')) {
            return response()->json([
                'msg' => 'Eres un usuario'
            ]);
        }
        return $next($request);
    }
}
