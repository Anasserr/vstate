<?php

namespace App\Http\Requests;

use App\Models\Eventuserstatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventuserstatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('eventuserstatus_edit');
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
