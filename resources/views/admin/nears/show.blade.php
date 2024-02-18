@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.near.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nears.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.near.fields.id') }}
                        </th>
                        <td>
                            {{ $near->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.near.fields.title') }}
                        </th>
                        <td>
                            {{ $near->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.near.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $near->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.near.fields.image') }}
                        </th>
                        <td>
                            @if($near->image)
                                <a href="{{ $near->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $near->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nears.index') }}">
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
            <a class="nav-link" href="#near_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="near_real_estate_units">
            @includeIf('admin.nears.relationships.nearRealEstateUnits', ['realEstateUnits' => $near->nearRealEstateUnits])
        </div>
    </div>
</div>

@endsection