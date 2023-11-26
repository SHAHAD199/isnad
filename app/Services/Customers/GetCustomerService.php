<?php 

namespace App\Services\Customers;

use App\Helpers\{JsonResponse,PerPage};
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Spatie\QueryBuilder\QueryBuilder;

class GetCustomerService 
{
    public static function index($request)
    {
        try {
            $paginations  = QueryBuilder::for(Customer::class)
            ->with('blocks')
            ->allowedFilters(['name','phone', 'inquiryType','added_by','adType','date','contact_type'])
            ->paginate(PerPage::perPageFun($request));
    
            $customers = CustomerResource::collection($paginations);
            return JsonResponse::respondSuccess($customers, $paginations);
        }
        catch (\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public static function show($customer) 
    {
        try {
           return new CustomerResource($customer);
        }
        catch (\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}