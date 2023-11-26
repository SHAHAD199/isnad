<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;


class CheckJwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next , ...$guards)
    {
 
     

        $user = null;
        try{
         $user = JWTAuth::parseToken()->authenticate();
        } catch(Exception $exception){
           if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
            return response()->json(['status' => false , 'message' => 'Token is Invalid']);
           } else if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
            return response()->json(['status' => false , 'message' => 'Token is Expired']);
           }else {
            return response()->json(['status' => false , 'message' => 'Authenticated Token Not Found']);
           }
        }
        return $next($request);
    }
    
}