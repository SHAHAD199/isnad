<?php 

namespace App\Services\Roles;

use App\Helpers\JsonResponse;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class PostRoleService 
{
    public static function store($request)
    {
        try
        {
           $role = Role::create($request->all());
           if($request->permissions) {$role->permissions()->attach($request->permissions);}
           return new RoleResource($role->load('permissions'));  
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function update($request, $role)
    {
        try
        {
            $role->update($request->all());
            if($request->permissions) {$role->permissions()->sync($request->permissions);}
            return new RoleResource($role->load('permissions'));   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function destroy(Role $role)
    {
        try
        {
            $role->delete();
            return response()->json(['message' => 'delete']);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}