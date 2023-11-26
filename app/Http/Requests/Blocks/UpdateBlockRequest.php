<?php

namespace App\Http\Requests\Blocks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlockRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status'         => ['nullable', 'integer', Rule::in([0,1,2,3,4,5])],
            'customer_name'  => ['nullable', 'string' , 'regex:/^[a-zA-Zء-ي]/'],
            'note'           => ['nullable', 'string' , 'regex:/^[a-zA-Zء-ي]/'],
            'customer_phone' => ['nullable', 'string' , 'max:11','regex:/(07)[0-9]{9}/'],
            'img'            => ['nullable', 'file']  ,
            'booking_date'   => ['nullable', 'date'],
            'update_by'      => ['nullable', 'string', 'regex:/^[a-zA-Zء-ي]/'],
            'sale_date'      => ['nullable', 'date'],
            'assistant'      => ['nullable', 'string', 'regex:/^[a-zA-Zء-ي]/']
        ];
    }
}
