<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'attachments' => [
                'array',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lang' => [
                'string',
                'nullable',
            ],
        ];
    }
}
