<?php 

namespace App\Services\Blocks;

use App\Helpers\{BlockStatusFuns, CustomerCreate, JsonResponse, MergeBlocks, BlockFunctions};
use App\Http\Resources\BlockResource;
use App\Models\Block;
use Illuminate\Support\Facades\DB;

class PostBlockService 
{
    public static function store($request)
    {
        try
        {
           $block = Block::create(MergeBlocks::merge($request));
           return new BlockResource($block->load('section'));  
        }
        catch(\Exception $e)
        {
           return JsonResponse::respondError($e->getMessage());
        }
    }

    public static function update($request, $block)
    {
        
        try
        // {
            
        //     if($block->customers->isEmpty())
        //     {
        //          BlockStatusFuns::nullUpdatedBy($request,$block);
        //     }
          
           
        //     else if(isset($block->customers) && !$block->customers->isEmpty()){
               
        //          $updated_by = DB::table('block_customer')->where('block_id', $block->id)
        //                       ->where('customer_id', CustomerCreate::store($request))->first()->updated_by; 
             
        //         if($request->status == 5)
        //          {BlockStatusFuns::resale($request, $block);}

        //         else if( $updated_by != auth('admin')->user()->name && ($block->status != 2 && $request->status == 3))
        //          {BlockStatusFuns::BlockStatusNotEqual2($request, $block);}

        //         else if($updated_by != auth('admin')->user()->name &&  ($block->status == 2 && $request->status == 3))
        //          {return BlockStatusFuns::BlockStatusEqual2();}
                 
        //         else {BlockStatusFuns::defaultStatus($request,$block);}
        //     }
        //     return new BlockResource($block->load('customers'));   
        // }
        
         {
            $customer_id = CustomerCreate::store($request);
            if(DB::table('block_customer')->where('block_id' , $block->id)->where('customer_id', $customer_id)->count() == 0):
                $block->update(['status' => $request->status]);
                BlockFunctions::store_customer($request, $block);

              elseif ($block->status != 5 && DB::table('block_customer')->where('block_id' , $block->id)->where('customer_id', $customer_id)->count() != 0 ) :
                $block->update(['status' => ($request->status) ? $request->status : $block->status ]);
                BlockFunctions::update_customer($block, $request);


            endif;

                 return new BlockResource($block->load('customers'));   

        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public function destroy(Block $block)
    {
        try
        {
           $block->delete();
           return response()->json(['message' => 'delete']);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}
