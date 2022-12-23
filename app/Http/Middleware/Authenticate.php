<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
class Authenticate
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
        $email = $request->header('x-email');
        $user = User::where('email', $email)->first();

        if ($user == null) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $request->merge(['user' => $user]);
 
        return $next($request);
    }
}
