<?php

namespace App\Http\Requests;

use App\Models\EventDiscussion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventDiscussionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_discussion_create');
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
