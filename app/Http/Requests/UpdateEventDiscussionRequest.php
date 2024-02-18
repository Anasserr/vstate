<?php

namespace App\Http\Requests;

use App\Models\EventDiscussion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventDiscussionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_discussion_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
