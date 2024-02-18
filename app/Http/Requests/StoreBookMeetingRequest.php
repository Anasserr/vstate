<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],

            'project_id' => [
                'nullable',
                'integer',
            ],
        ];
    }
}