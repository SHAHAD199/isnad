<?php 

namespace App\Services\Admins;

use App\Helpers\JsonResponse;
use App\Http\Resources\AdminResource;
use App\Models\Admin;

class PostAdminService 
{
    public static function store($request)
    {
        try
        {
         $admin = Admin::create($request->all());
          return new AdminResource($admin->load('role'));   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function update($request, $admin)
    {
        try
        {
          $admin->update($request->all());
          return new AdminResource($admin->load('role'));   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function destroy(Admin $admin)
    {
        try
        {
            $admin->delete();
            return response()->json(['message' => "sucess"]);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function login()
    {
      try
      {
        $credentials = request(['phone', 'password']);

        if (! $token = auth('admin')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'admin'      => new AdminResource(auth('admin')->user()->load('role'))
        ]);
      }
      catch(\Exception $e)
      {
          return JsonResponse::respondError($e->getMessage());
      }
    }

    public static function logout()
    {
        if (auth('admin')->check()) // this means that the admin was logged in.
        {
          auth('admin')->logout();
          return response()->json(['message' => 'User successfully signed out']);
        }
    }
}