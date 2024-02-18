<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): mixed
    {
        return [
            'password' => [
                'string',
                'min:6',
                'required',
            ],

            'current_password' => [
                'string',
                'min:6',
                'required',
            ],
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