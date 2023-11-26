<?php 

namespace App\Services\Customers;

use App\Helpers\{JsonResponse, MergeCustomer};
use App\Http\Resources\CustomerResource;
use App\Models\Customer;



class PostCustomerService 
{
    public static function store($request)
    {
        try {
            $customer = Customer::create(MergeCustomer::merge($request));
            return new CustomerResource($customer);
        }
        catch(\Exception $e) 
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function update($request, $customer)
    {
        try {
            $customer->update(MergeCustomer::updatemerge($request,$customer));
            return new CustomerResource($customer);
        }
        catch(\Exception $e) 
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }

}