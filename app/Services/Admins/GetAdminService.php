<?php 


namespace App\Services\Admins;

use App\Helpers\{JsonResponse, PerPage};
use App\Http\Resources\AdminResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Admin;

class GetAdminService 
{
    public function index($request)
    {
        try
        {
         $pagination = QueryBuilder::for(Admin::class)->paginate(PerPage::perPageFun($request));       
         $admins = AdminResource::collection($pagination);
         return JsonResponse::respondSuccess($admins , $pagination);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
     
    }


    public function show($admin)
    {
        try
        {
          return new AdminResource($admin);   
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}