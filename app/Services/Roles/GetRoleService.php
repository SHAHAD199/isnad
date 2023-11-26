<?php 

namespace App\Services\Roles;

use App\Helpers\{JsonResponse, PerPage};
use App\Http\Resources\RoleResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;


class GetRoleService 
{
 
    public static function index($request)
    {
       try {
          $pagination = QueryBuilder::for(Role::class)
          ->paginate(PerPage::perPageFun($request));
          $roles = RoleResource::collection($pagination);
          return JsonResponse::respondSuccess($roles , $pagination);
 
       }
       catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    
}