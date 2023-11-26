<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "phone"     =>  ['required','string','max:11','regex:/(07)[0-9]{9}/'],
            "password"  =>  ['required' , 'string']
        
        ];
    }
}
