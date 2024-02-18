<?php

namespace App\Http\Requests;

use App\Models\UnitComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUnitCommentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unit_comment_create');
    }

    public function rules()
    {
        return [];
    }
}
