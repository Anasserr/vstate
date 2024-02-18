<?php

namespace App\Http\Requests;

use App\Models\Eventtag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventtagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('eventtag_create');
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
