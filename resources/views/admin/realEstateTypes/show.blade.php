@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realEstateType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateType.fields.id') }}
                        </th>
                        <td>
                            {{ $realEstateType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateType.fields.title') }}
                        </th>
                        <td>
                            {{ $realEstateType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateType.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $realEstateType->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateType.fields.image') }}
                        </th>
                        <td>
                            @if($realEstateType->image)
                                <a href="{{ $realEstateType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $realEstateType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-types.index') }}">
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
            <a class="nav-link" href="#type_real_estate_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateApplication.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#type_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="type_real_estate_applications">
            @includeIf('admin.realEstateTypes.relationships.typeRealEstateApplications', ['realEstateApplications' => $realEstateType->typeRealEstateApplications])
        </div>
        <div class="tab-pane" role="tabpanel" id="type_real_estate_units">
            @includeIf('admin.realEstateTypes.relationships.typeRealEstateUnits', ['realEstateUnits' => $realEstateType->typeRealEstateUnits])
        </div>
    </div>
</div>

@endsection