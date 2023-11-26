<?php 

namespace App\Services\Blocks;

use App\Helpers\{JsonResponse, PerPage};
use Spatie\QueryBuilder\{QueryBuilder,AllowedFilter};
use App\Http\Resources\BlockResource;
use App\Models\Block;

class GetBlockService 
{
    public static function index($request)
    {
       try {
          $paginations = QueryBuilder::for(Block::class)
          ->allowedIncludes('payment')
          ->with('customers')
          ->allowedFilters(['number','block', 'title', 'status' , AllowedFilter::exact('section.id')])
          ->paginate(PerPage::perPageFun($request));
          $blocks =  BlockResource::collection($paginations);
          return JsonResponse::respondSuccess($blocks,$paginations);
       }
       catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }


    public static function show($block)
    {
        try{
            return new BlockResource($block);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
    
    
      public function statistics()
    {
         try{
            return response()->json([
                'total_homes'              => Block::get()->count(),
                'total_reserved_home'      => Block::where('status',2)->get()->count(),
                'total_sold_home'         => Block::whereIn('status',[3,4])->get()->count(),
                'total_available_home'     => Block::where('status',1)->get()->count(),
                'total_not_available_home' => Block::where('status',0)->get()->count(),
                'total_sold_by_tiba'       => Block::where('status', 4)->get()->count(),
                'total_sold_by_isnad'       => Block::where('status', 3)->get()->count()
          ]);
        }
        catch(\Exception $e)
        {
            return JsonResponse::respondError($e->getMessage());
        }
    }
}

