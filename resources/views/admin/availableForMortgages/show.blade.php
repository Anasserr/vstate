@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.availableForMortgage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.available-for-mortgages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.availableForMortgage.fields.id') }}
                        </th>
                        <td>
                            {{ $availableForMortgage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.availableForMortgage.fields.title') }}
                        </th>
                        <td>
                            {{ $availableForMortgage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.availableForMortgage.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $availableForMortgage->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.availableForMortgage.fields.image') }}
                        </th>
                        <td>
                            @if($availableForMortgage->image)
                                <a href="{{ $availableForMortgage->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $availableForMortgage->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.available-for-mortgages.index') }}">
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
            <a class="nav-link" href="#listings_available_for_mortgage_real_estate_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateApplication.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="listings_available_for_mortgage_real_estate_applications">
            @includeIf('admin.availableForMortgages.relationships.listingsAvailableForMortgageRealEstateApplications', ['realEstateApplications' => $availableForMortgage->listingsAvailableForMortgageRealEstateApplications])
        </div>
    </div>
</div>

@endsection