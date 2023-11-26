<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name'       => ['string' , 'string' ,'regex:/^[a-zA-Zء-ي]/'],
            "phone"     =>  ['required','string','max:11','regex:/(07)[0-9]{9}/','unique:admins'],
            'password'  =>  ['string' , 'required'],
            'role_id'   =>  ['integer', 'required', 'exists:roles,id'],
        ];
    }
}
