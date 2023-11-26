<?php 


namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class BlockFunctions 
{
      
       public static function store_customer($request, $block){
        $customer_id =  CustomerCreate::store($request);
        DB::table('block_customer')->insert([
            'block_id'         => $block->id,
            'customer_id'      => $customer_id,
            'updated_by'       => ($request->update_by) ? $request->updated_by  : "",
            'booking_date'     => $request->booking_date,
            'sale_date'        => $request->sale_date,
            'note'             => $request->note,
            'img'              => ImgStore::img_mod($request),               
            'assistant'        => $request->assistant,
            'updated_at'       => now()
            ]);
       }


       public static function update_customer($block, $request)
       {
        $customer_id =  CustomerCreate::store($request);
        DB::table('block_customer')->where('block_id', $block->id)->where('customer_id', $customer_id)->update([
            'updated_by'       => ($request->update_by) ? $request->updated_by  : "",
            'booking_date'     => ($request->booking_date) ? $request->booking_date : $block->booking_date,
            'sale_date'        => ($request->sale_date) ? $request->sale_date : $block->sale_date,
            'note'             => ($request->note) ? $request->note : $block->note,
            'img'              => ($request->img) ?ImgStore::img_mod($request) : $block->img,               
            'assistant'        => ($request->assistant) ? $request->assistant : $block->assistant,
            'updated_at'       => now()
            ]);
       }
}