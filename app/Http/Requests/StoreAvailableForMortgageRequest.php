<?php

namespace App\Http\Requests;

use App\Models\AvailableForMortgage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAvailableForMortgageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('available_for_mortgage_create');
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
