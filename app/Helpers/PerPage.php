<?php 

namespace App\Helpers;

class PerPage 
{

    public static function perPageFun($request) 
    {
        return $request->has('per_page') ? (int) $request->per_page : 10;
        
    }

}