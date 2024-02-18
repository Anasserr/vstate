<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ForgotPassordFromApi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request)
    {
        return [
            'email' => 'email|required', //|max:12|exists:users,phone,deleted_at,NULL
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('site.email_required'),
            'email.exists' => __('site.There is no account associated with this email'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [];
        $response['code'] = 422;
        $response['data'] = [];
        $response['pagination'] = [];
        $response['message'] = $validator->errors() ; //->first();
        $response['item'] = '';
    }
}