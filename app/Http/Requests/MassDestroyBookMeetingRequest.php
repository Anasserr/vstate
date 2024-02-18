<?php

namespace App\Http\Requests;

use App\Models\BookMeeting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBookMeetingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('book_meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:book_meetings,id',
        ];
    }
}
