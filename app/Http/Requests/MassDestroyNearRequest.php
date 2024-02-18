<?php

namespace App\Http\Requests;

use App\Models\Near;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNearRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('near_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nears,id',
        ];
    }
}
