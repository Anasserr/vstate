<?php

namespace App\Http\Requests;

use App\Models\ApplicationsRequestSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationsRequestSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applications_request_section_create');
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
