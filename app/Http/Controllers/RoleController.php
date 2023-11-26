<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Roles\{GetRoleService,PostRoleService};
use App\Http\Requests\Roles\{StoreRoleRequest,UpdateRoleRequest};


class RoleController extends Controller
{

    private $getRoleService, $postRoleService;
    public function __construct(GetRoleService $getRoleService, PostRoleService $postRoleService)
    {
        $this->getRoleService = $getRoleService;
        $this->postRoleService  = $postRoleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return  $this->getRoleService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
      return  $this->postRoleService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
       return $this->postRoleService->update($request , $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      return  $this->postRoleService->destroy($role);
    }
}
