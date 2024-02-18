<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'event_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'addresse' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
            'location_link' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lang' => [
                'string',
                'nullable',
            ],
            'event_tags.*' => [
                'integer',
            ],
            'event_tags' => [
                'array',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
