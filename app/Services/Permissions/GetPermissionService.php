<?php 

namespace App\Services\Permissions;

use App\Helpers\{PerPage,JsonResponse};

use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;

class GetPermissionService 
{
    public function index($request)
    {
        try
        {
         $pagination = QueryBuilder::for(Permission::class)->paginate(PerPage::perPageFun($request));       
         $admins = PermissionResource::collection($pagination);
         return JsonResponse::respondSuccess($admins , $pagination);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
