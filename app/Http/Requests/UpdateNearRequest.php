<?php

namespace App\Http\Requests;

use App\Models\Near;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNearRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('near_edit');
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
