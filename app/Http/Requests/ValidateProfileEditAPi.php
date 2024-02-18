<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class ValidateProfileEditAPi extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): mixed
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . Auth::user()->id,
            ],
            /*'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ], */
            'phone' => [
                'nullable',
                'integer',
                //  'min:-2147483648',
                //'max:2147483647',
            ],
            'companies.*' => [
                'integer',
            ],
            'companies' => [
                'array',
            ],
            'comapny_services.*' => [
                'integer',
            ],
            'comapny_services' => [
                'array',
            ],
        ];
    }

    public function messages(): mixed
    {
        return [
            'userTypeId.required' => __('site.User type required'),
            'userTypeId.exists'   => __('site.User_Type_Not_Found'),
            'fullName.required'   => __('site.Username is required'),
            'email.required'      => __('site.Email is required'),
            'phone.required'      => __('site.Mobile number is required'),
            'password.required'   => __('site.The password is required and must not be less than six digits'),
        ];
    }

    /*
    * overwrite response in form request parent class
    */
    protected function failedValidation(Validator $validator): mixed
    {
        $response               = [];
        $response['code']       = 422;
        $response['data']       = '';
        $response['pagination'] = '';
        $response['message']    = $validator->errors()/*->first()*/;
        $response['item']       = '';

        throw new HttpResponseException(response()->json($response, 420));
    }
}