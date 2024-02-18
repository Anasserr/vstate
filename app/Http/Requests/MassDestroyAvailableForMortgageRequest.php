<?php

namespace App\Http\Requests;

use App\Models\AvailableForMortgage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAvailableForMortgageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('available_for_mortgage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:available_for_mortgages,id',
        ];
    }
}
