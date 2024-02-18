<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ResetPasswordFromAPiRequest extends FormRequest
{


    protected $forceJsonResponse = true;
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
     *'email'   =>'required|email',
    'passowrd'=>'required|min:6',
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            //    'email' => 'required|string|email|max:255',
            'token' => 'required|string',
            'password' => 'required|string|min:8',
        ];

    }

    public function messages()
    {
        return [
            //  'email.required'     =>  'البريد الالكترونى مطلوب ',
            'token.required'     =>  __("site.Password reset code is required"),
            'password.required'     =>  __("site.The password is required and must not be less than six digits"),
        ];
    }

    /*
    * overwrite response in form request parent class
    */
    protected function failedValidation(Validator $validator) {
        $response = [];
        $response['code'] = 422;
        $response['data'] = '' ;
        $response['pagination'] = '' ;
        $response['message'] = $validator->errors()->first();
        $response['item'] = "";
        throw new HttpResponseException(response()->json($response, 420));
    }
}
