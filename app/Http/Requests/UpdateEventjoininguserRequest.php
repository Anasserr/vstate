<?php

namespace App\Http\Requests;

use App\Models\Eventjoininguser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventjoininguserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('eventjoininguser_edit');
    }

    public function rules()
    {
        return [
            'event_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'event_status_id' => [
                'required',
                'integer',
            ],
        ];
    }
}