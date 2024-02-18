@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.city.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.id') }}
                        </th>
                        <td>
                            {{ $city->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $city->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.title_en') }}
                        </th>
                        <td>
                            {{ $city->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.country') }}
                        </th>
                        <td>
                            {{ $city->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.image') }}
                        </th>
                        <td>
                            @if($city->image)
                                <a href="{{ $city->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $city->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
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
            <a class="nav-link" href="#city_regions" role="tab" data-toggle="tab">
                {{ trans('cruds.region.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#city_events" role="tab" data-toggle="tab">
                {{ trans('cruds.event.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#city_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="city_regions">
            @includeIf('admin.cities.relationships.cityRegions', ['regions' => $city->cityRegions])
        </div>
        <div class="tab-pane" role="tabpanel" id="city_events">
            @includeIf('admin.cities.relationships.cityEvents', ['events' => $city->cityEvents])
        </div>
        <div class="tab-pane" role="tabpanel" id="city_real_estate_units">
            @includeIf('admin.cities.relationships.cityRealEstateUnits', ['realEstateUnits' => $city->cityRealEstateUnits])
        </div>
    </div>
</div>

@endsection