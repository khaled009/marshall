<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class ShopMiddleware
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
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }
        if($user=='user'){
            if (app()->getLocale()=='en'){
                return response()->json(['data'=>'you do not have permission'], 404);

            }
            return response()->json(['data'=>'لا يوجد لديك صلاحية'], 404);

        }
        return $next($request);
    }
}
