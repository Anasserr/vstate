<?php

namespace App\Http\Requests;

use App\Models\EventDiscussion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEventDiscussionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('event_discussion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:event_discussions,id',
        ];
    }
}
