<?php

namespace App\Http\Requests;

use App\Models\UnitComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUnitCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unit_comment_edit');
    }

    public function rules()
    {
        return [];
    }
}
