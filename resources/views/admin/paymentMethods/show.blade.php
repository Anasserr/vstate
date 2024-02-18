@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paymentMethod.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-methods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentMethod.fields.id') }}
                        </th>
                        <td>
                            {{ $paymentMethod->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentMethod.fields.title') }}
                        </th>
                        <td>
                            {{ $paymentMethod->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentMethod.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $paymentMethod->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paymentMethod.fields.image') }}
                        </th>
                        <td>
                            @if($paymentMethod->image)
                                <a href="{{ $paymentMethod->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $paymentMethod->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payment-methods.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#payment_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="payment_real_estate_units">
            @includeIf('admin.paymentMethods.relationships.paymentRealEstateUnits', ['realEstateUnits' => $paymentMethod->paymentRealEstateUnits])
        </div>
    </div>
</div>

@endsection