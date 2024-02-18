<?php

namespace App\Http\Requests;

use App\Models\FinishType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFinishTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('finish_type_edit');
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
