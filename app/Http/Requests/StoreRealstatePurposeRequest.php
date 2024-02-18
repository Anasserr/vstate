<?php

namespace App\Http\Requests;

use App\Models\RealstatePurpose;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRealstatePurposeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('realstate_purpose_create');
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
