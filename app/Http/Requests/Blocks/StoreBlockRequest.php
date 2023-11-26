<?php

namespace App\Http\Requests\Blocks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlockRequest extends FormRequest
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
            'number'         => ['integer' , 'required'],
            'section_id'     => ['integer' , 'required', 'exists:sections,id'],
            'block_number'   => ['integer' , 'required'],
            'color'          => ['nullable' , 'string' ,'regex:/^[a-zA-Zء-ي]/'],
            'area'           => ['required', 'integer', Rule::in([240,280])],
            'status'         => ['nullable', 'integer', Rule::in([0,1,2,3])],
            'customer_name'  => ['nullable' , 'string','regex:/^[a-zA-Zء-ي]/'],
            'note'           => ['nullable' , 'string','regex:/^[a-zA-Zء-ي]/']
        ];
    }
}
