<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class BlockStatusFuns
{
    public static function nullUpdatedBy($request, $block)
    {

           date_default_timezone_set('Asia/Baghdad');
           $block->update(['status'   =>   $request->status]);

        
        if( DB::table('block_customer')->where('block_id' , $block->id)->where('customer_id' ,CustomerCreate::store($request))->count() == 0):
            DB::table('block_customer')->insert([
            'updated_by'       => $request->updated_by,
            'booking_date'     => $request->booking_date,
            'sale_date'        => $request->sale_date,
            'note'             => $request->note ,
            'img'              => ImgStore::img_mod($request),
            'block_id'         => $block->id,
            'customer_id'      => CustomerCreate::store($request),
            'assistant'        => $request->assistant,
            'updated_at'       => now()
            ]);   
            
        endif;
    }

    public static function BlockStatusNotEqual2($request,$block)
    {
        date_default_timezone_set('Asia/Baghdad');
        $block->update(['status'   => $request->status]);
       
        if( DB::table('block_customer')->where('block_id' , $block->id)->where('customer_id',CustomerCreate::store($request))->count() == 0):
        DB::table('block_customer')->insert([
            'updated_by'       => self::customer_info($request,$block)->updated_by,
            'note'             => $request->note ,
            'img'              => ImgStore::img_mod($request),
            'block_id'         => $block->id,
            'customer_id'      => CustomerCreate::store($request),
            'assistant'        => ($request->assistant) ? $request->assistant : self::customer_info($request,$block)->assistant,
            'updated_at'       => now()
            ]);
        endif;
    }

    public static function BlockStatusEqual2()
    {
        return response()->json(['message' => 'you can not update'],403);
    }

    
    public static function defaultStatus($request,$block)
    {
       date_default_timezone_set('Asia/Baghdad');
       
       
       $block->update(['status'  => $request->status]);

       if( DB::table('block_customer')->where('block_id' , $block->id)->where('customer_id' ,CustomerCreate::store($request))->count() == 0):

       $updated_by = self::customer_info($request,$block)->updated_by;

       DB::table('block_customer')->insert([
         
        'updated_by'       => ($updated_by) ? $updated_by  : $request->updated_by,
        'booking_date'     => $request->booking_date,
        'sale_date'        => $request->sale_date,
        'note'             => $request->note ,
        'img'              => ImgStore::img_mod($request),
        'block_id'         => $block->id,
        'customer_id'      => CustomerCreate::store($request),
        'assistant'        => ($request->assistant) ? $request->assistant : self::customer_info($request,$block)->assistant,
        'updated_at'       => now()
        ]);
      endif;
    }

    public static function resale ($request,$block)
    {
        $block->update(['status'  => $request->status]);   
    }
    
    public static function customer_info($request, $block){
        return DB::table('block_customer')->where('block_id', $block->id)
        ->where('customer_id', CustomerCreate::store($request))->first();
    }
}