<?php

namespace App\Http\Requests;

use App\Models\RealEstateApplication;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRealEstateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('real_estate_application_edit');
    }

    public function rules()
    {
        return [
            'addresse' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'deliver_year' => [
                'string',
                'nullable',
            ],
            'number_of_rooms' => [
                'string',
                'nullable',
            ],
            'floor' => [
                'string',
                'nullable',
            ],
            'user_name' => [
                'string',
                'nullable',
            ],
            'user_phone' => [
                'string',
                'nullable',
            ],
            'time_of_call' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'listings_available_for_mortgages.*' => [
                'integer',
            ],
            'listings_available_for_mortgages' => [
                'array',
            ],
            'payment_methods.*' => [
                'integer',
            ],
            'payment_methods' => [
                'array',
            ],
            'types.*' => [
                'integer',
            ],
            'types' => [
                'array',
            ],
            'views.*' => [
                'integer',
            ],
            'views' => [
                'array',
            ],
            'finish_types.*' => [
                'integer',
            ],
            'finish_types' => [
                'array',
            ],
            'min_area' => [
                'string',
                'nullable',
            ],
            'max_area' => [
                'string',
                'nullable',
            ],
        ];
    }
}
