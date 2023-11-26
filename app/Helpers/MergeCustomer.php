<?php 

namespace App\Helpers;
use Carbon\Carbon;


class MergeCustomer
{
    public static function merge($request)
    {
        return array_merge($request->all(), [
            'added_by'  => auth('admin')->user()->name,
            'date'    => Carbon::parse($request->date)->format('Y-m-d H:i:s')
        ]);
    }
    
     public static function updatemerge($request,$customer)
    {
        return array_merge($request->all(), [
            'updated_by'  => auth('admin')->user()->name,
            'date'        => ($request->date) ? Carbon::parse($request->date)->format('Y-m-d H:i:s') : $customer->date
        ]);
    }
    
}