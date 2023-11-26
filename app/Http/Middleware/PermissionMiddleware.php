<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use Psy\Util\Str;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $permission)
    {
        if(Auth::guard('admin')->check()){
            $role = Auth::guard('admin')->user()->role_id;
            $role_model = Role::find($role);
            $permission_role = collect($role_model->permissions)->pluck('code')->toArray();
    
               $array_permissions = explode('|', $permission);
               if(!array_intersect($array_permissions, $permission_role)){
                return response()->json(['message' => 'عذرا لا يمكنك الدخول لهذه الصفحة' ,'status' => 403]);
             }
            }
           
         
            return $next($request);
        }
}