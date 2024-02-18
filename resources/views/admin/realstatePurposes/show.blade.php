@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realstatePurpose.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realstate-purposes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realstatePurpose.fields.id') }}
                        </th>
                        <td>
                            {{ $realstatePurpose->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realstatePurpose.fields.title') }}
                        </th>
                        <td>
                            {{ $realstatePurpose->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realstatePurpose.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $realstatePurpose->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realstatePurpose.fields.image') }}
                        </th>
                        <td>
                            @if($realstatePurpose->image)
                                <a href="{{ $realstatePurpose->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $realstatePurpose->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realstate-purposes.index') }}">
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
            <a class="nav-link" href="#purpose_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="purpose_real_estate_units">
            @includeIf('admin.realstatePurposes.relationships.purposeRealEstateUnits', ['realEstateUnits' => $realstatePurpose->purposeRealEstateUnits])
        </div>
    </div>
</div>

@endsection