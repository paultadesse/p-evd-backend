<?php

namespace App\Http\Requests\SalesManager;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateSalesManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //later change this return statment to check auth guard [ it must be only admin-api ]
        // return auth()->getDefaultDriver() == 'admin-api';
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:sales_managers',
            'password' => 'required',
        ];
    }

    //override the faildValidation method of this form request class...
    protected function failedValidation(Validator $validator) 
    { 
        throw new HttpResponseException(response()->json($validator->errors(), 422)); 
    }
}
