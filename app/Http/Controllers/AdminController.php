<?php

namespace App\Http\Controllers;

use App\Services\Admins\{GetAdminService,PostAdminService};
use App\Http\Requests\Admins\{StoreAdminRequest,UpdateAdminRequest,LoginRequest};
use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{
  
    private $getAdminService, $postAdminService;
 

    public function __construct(GetAdminService $getAdminService , PostAdminService $postAdminService)
    {
        $this->getAdminService  = $getAdminService;
        $this->postAdminService = $postAdminService;

    }

    public function index(Request $request)
    {
        return  $this->getAdminService->index($request);
    }

    public function store(StoreAdminRequest $request)
    {
        return $this->postAdminService->store($request);
    }

    
    public function me(Admin $admin)
    {
       return $this->getAdminService->show($admin);
    }

    
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
       return $this->postAdminService->update($request, $admin);
    }

    
    public function destroy(Admin $admin)
    {
        return $this->postAdminService->destroy($admin);
    }

    public function login(LoginRequest $request)
    {
        return $this->postAdminService->login($request);
    }

    public function logout()
    {
        return $this->postAdminService->logout();
    }
    
}
