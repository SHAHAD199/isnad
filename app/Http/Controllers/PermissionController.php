<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\Permissions\{StorePermissionRequest,UpdatePermissionRequest};
use App\Services\Permissions\{GetPermissionService,PostPermissionService};
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private $getPermissionService, $postPermissionServe;
  
    public function __construct(GetPermissionService $getPermissionService, PostPermissionService $postPermissionServe)
    {
        $this->getPermissionService = $getPermissionService;
        $this->postPermissionServe  = $postPermissionServe;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return $this->getPermissionService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
       return  $this->postPermissionServe->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
       return $this->postPermissionServe->update($request, $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $this->postPermissionServe->destroy($permission);
    }
}
