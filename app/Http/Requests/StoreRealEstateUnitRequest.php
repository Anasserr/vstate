<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('real_estate_unit_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
            'plans' => [
                'array',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'images_360' => [
                'array',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lang' => [
                'string',
                'nullable',
            ],
            'number_of_room' => [
                'string',
                'nullable',
            ],
            'number_of_floor' => [
                'string',
                'nullable',
            ],
            'number_of_bath_room' => [
                'string',
                'nullable',
            ],
            'number_of_master_room' => [
                'string',
                'nullable',
            ],
            'notes' => [
                'string',
                'nullable',
            ],
            'number_of_garage' => [
                'string',
                'nullable',
            ],
            'amenities.*' => [
                'integer',
            ],
            'amenities' => [
                'array',
            ],
            'nears.*' => [
                'integer',
            ],
            'nears' => [
                'array',
            ],
            'purposes.*' => [
                'integer',
            ],
            'purposes' => [
                'array',
            ],
            'payments.*' => [
                'integer',
            ],
            'payments' => [
                'array',
            ],
            'types.*' => [
                'integer',
            ],
            'types' => [
                'array',
            ],
        ];
    }
}