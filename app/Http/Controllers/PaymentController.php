<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\Payments\{StorePaymentRequest, UpdatePaymentRequest};
use App\Services\Payments\{GetPaymentService, PostPaymentService};
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private $postPaymentService, $getPaymentService;
    public function __construct(PostPaymentService $postPaymentService,GetPaymentService $getPaymentService)
    {
        $this->getPaymentService = $getPaymentService;
        $this->postPaymentService = $postPaymentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->getPaymentService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        return $this->postPaymentService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        return $this->postPaymentService->update($payment,$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
