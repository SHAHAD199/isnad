<?php

use App\Http\Controllers\{
    AdminController, BlockController,CustomerController, PaymentController, PermissionController, RoleController
};
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)->group(function(){
    Route::post('login' , 'login');
    Route::post('logout' , 'logout');
});


Route::apiResource('admins', AdminController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('permissions', PermissionController::class);
Route::apiResource('permissions', PermissionController::class);
Route::apiResource('blocks', BlockController::class);
Route::post('update_statue', [BlockController::class, 'update_status']);
Route::apiResource('customers', CustomerController::class);
Route::get('statistics', [BlockController::class, 'statistics']);
Route::apiResource('payments', PaymentController::class);



