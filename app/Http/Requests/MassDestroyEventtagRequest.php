<?php

namespace App\Http\Requests;

use App\Models\Eventtag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEventtagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('eventtag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:eventtags,id',
        ];
    }
}
