<?php 

namespace App\Services\Payments;

use App\Helpers\JsonResponse;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;

class PostPaymentService 
{
   public static function store($request)
   {
      try
      {
         $payment = Payment::create(self::calculate_total($request));
         return new PaymentResource($payment->load('block'));  
      }
      catch(\Exception $e)
      {
         return JsonResponse::respondError($e->getMessage());
      }
   }


   public static function update($payment, $request)
   {
      try
      {
         $payment->update($request->all());
         self::calculate_total_update($payment);
         return new PaymentResource($payment->load('block'));  
      }
      catch(\Exception $e)
      {
         return JsonResponse::respondError($e->getMessage());
      }
   }


   public static function calculate_total($request)
   {
       return   array_merge($request->all(), [
         'total'  => array_sum($request->except('block_id', 'cash_price')),
       ]);
   }


   public static function calculate_total_update($payment)
   {
      $payment->update(['total' => array_sum($payment->makeHidden(['block_id', 'cash_price']))]);
   }
}