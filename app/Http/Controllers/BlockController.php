<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Http\Requests\Blocks\StoreBlockRequest;
use App\Http\Requests\Blocks\UpdateBlockRequest;
use App\Services\Blocks\{GetBlockService,PostBlockService};
use Illuminate\Http\Request;

class BlockController extends Controller
{

    private $getBlockService,$postBlockService;
    public function __construct(GetBlockService $getBlockService , PostBlockService $postBlockService)
    {
        $this->getBlockService = $getBlockService;
        $this->postBlockService = $postBlockService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return $this->getBlockService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockRequest $request)
    {
       return  $this->postBlockService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
       return  $this->getBlockService->show($block);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockRequest  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockRequest $request, Block $block)
    {
       return  $this->postBlockService->update($request , $block);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        $this->postBlockService->destroy($block);
    }


  public function statistics()
    {
        return $this->getBlockService->statistics();
    }
  
}
