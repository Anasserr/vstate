<?php

namespace App\Http\Requests;

use App\Models\RealEstateType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRealEstateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('real_estate_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
