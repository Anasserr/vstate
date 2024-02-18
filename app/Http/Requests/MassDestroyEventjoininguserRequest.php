<?php

namespace App\Http\Requests;

use App\Models\Eventjoininguser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEventjoininguserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('eventjoininguser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:eventjoiningusers,id',
        ];
    }
}
