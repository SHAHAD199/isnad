<?php 

namespace App\Helpers;

use App\Models\Customer;

class CustomerCreate 
{
    public static function store($request)
    {
        if(Customer::where('phone', $request->customer_phone)->count() == 0 && !is_null($request->customer_phone)){
            $customer =  Customer::create([
                 'name'             => $request->customer_name,
                 'phone'            => $request->customer_phone,
               
             ]);           
         }else {
             $customer = Customer::where('phone', $request->customer_phone)->first();
         }

         return $customer->id;
    }
}