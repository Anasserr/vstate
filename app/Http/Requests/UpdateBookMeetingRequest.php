<?php

namespace App\Http\Requests;

use App\Models\BookMeeting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookMeetingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_meeting_edit');
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
        ];
    }
}
