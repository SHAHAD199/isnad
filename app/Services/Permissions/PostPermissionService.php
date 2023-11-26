<?php 

namespace App\Services\Permissions;

use App\Helpers\JsonResponse;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class PostPermissionService 
{
    public static function store($request)
    {
        try
        {
          return  new PermissionResource(Permission::create($request->all()));   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function update($request, $permission)
    {
        try
        {
         $permission->update($request->all());
          return new PermissionResource($permission);   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function destroy(Permission $permission)
    {
        try
        {
            $permission->delete();
            return response()->json(['message' => 'delete']);

        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

}
