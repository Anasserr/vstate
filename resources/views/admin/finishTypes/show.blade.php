@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.finishType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.finish-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.finishType.fields.id') }}
                        </th>
                        <td>
                            {{ $finishType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.finishType.fields.title') }}
                        </th>
                        <td>
                            {{ $finishType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.finishType.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $finishType->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.finishType.fields.image') }}
                        </th>
                        <td>
                            @if($finishType->image)
                                <a href="{{ $finishType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $finishType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.finish-types.index') }}">
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
            <a class="nav-link" href="#finish_type_real_estate_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateApplication.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="finish_type_real_estate_applications">
            @includeIf('admin.finishTypes.relationships.finishTypeRealEstateApplications', ['realEstateApplications' => $finishType->finishTypeRealEstateApplications])
        </div>
    </div>
</div>

@endsection