<?php 

namespace App\Services\Payments;

use App\Helpers\{JsonResponse, PerPage};
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Spatie\QueryBuilder\QueryBuilder;

class GetPaymentService 
{
    public static function index($request)
    {
        try {
            $paginations = QueryBuilder::for(Payment::class)
            ->allowedIncludes('block')
            ->paginate(PerPage::perPageFun($request));
            $payment =  PaymentResource::collection($paginations);
            return JsonResponse::respondSuccess($payment,$paginations);
         }
         catch(\Exception $e)
          {
              return JsonResponse::respondError($e->getMessage());
          }
    }
}

