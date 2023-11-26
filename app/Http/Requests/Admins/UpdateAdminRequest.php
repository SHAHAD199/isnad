<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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

        $admin = $this->route()->parameter('admin');

        return [
            'name'       => ['nullable' , 'string' ,'regex:/^[a-zA-Zء-ي]/'],
            'phone'      => ['nullable' , 'string' , 'max:11', 'regex:/(07)[0-9]{9}/'],
            'role_id'    => ['integer', 'nullable', 'exists:roles,id']
        ];
    }
}
