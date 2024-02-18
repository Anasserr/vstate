<?php

namespace App\Http\Requests;

use App\Models\AvailableForMortgage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAvailableForMortgageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('available_for_mortgage_edit');
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
