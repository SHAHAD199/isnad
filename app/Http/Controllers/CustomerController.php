<?php

namespace App\Http\Controllers;

use App\Services\Customers\{GetCustomerService,PostCustomerService};

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    private $getCustomerService,$postCustomerService;
    public function __construct(GetCustomerService $getCustomerService, PostCustomerService $postCustomerService)
    {
        $this->getCustomerService = $getCustomerService;
        $this->postCustomerService = $postCustomerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->getCustomerService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->postCustomerService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return $this->getCustomerService->show($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        return $this->postCustomerService->update($request, $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
