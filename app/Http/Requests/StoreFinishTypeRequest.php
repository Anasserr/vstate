<?php

namespace App\Http\Requests;

use App\Models\FinishType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFinishTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('finish_type_create');
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
