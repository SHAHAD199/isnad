<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'block_id'              => ['required','integer','exists:blocks,id'],
            'cash_price'            => ['nullable','integer'],
            'first_payment'         => ['nullable','integer'],
            'second_payment'        => ['nullable','integer'],
            'third_payment'         => ['nullable','integer'],
            'fourth_payment'        => ['nullable','integer'],
            'fifth_payment'         => ['nullable','integer'],
            'sixth_payment'         => ['nullable','integer'],
            'seventh_payment'       => ['nullable','integer'],
            'eighth_payment'        => ['nullable','integer'],
            'ninth_payment'         => ['nullable','integer'],
            'tenth_payment'         => ['nullable','integer'],
            'eleventh_payment'      => ['nullable','integer'],
            'twelfth_payment'       => ['nullable','integer'],
            'thirteenth_payment'    => ['nullable','integer'],
            'fourteenth_payment'    => ['nullable','integer'],
            'fifteenth_payment'     => ['nullable','integer'],
            'sixteenth_payment'     => ['nullable','integer'],
            'seventeenth_payment'   => ['nullable','integer'],
            'eighteenth_payment'    => ['nullable','integer'],
        ];
    }
}
