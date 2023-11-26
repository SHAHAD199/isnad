<?php

namespace App\Http\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name'           => ['required' , 'string' ,'regex:/^[a-zA-Zء-ي]/'],
            'permissions'    => ['required','array'],
            'permissions.*'  => ['required', 'integer' , 'exists:permissions,id']
        ];
    }
}
