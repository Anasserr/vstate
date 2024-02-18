@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.view.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.views.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.view.fields.id') }}
                        </th>
                        <td>
                            {{ $view->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.view.fields.title') }}
                        </th>
                        <td>
                            {{ $view->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.view.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $view->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.view.fields.image') }}
                        </th>
                        <td>
                            @if($view->image)
                                <a href="{{ $view->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $view->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.views.index') }}">
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
            <a class="nav-link" href="#view_real_estate_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateApplication.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="view_real_estate_applications">
            @includeIf('admin.views.relationships.viewRealEstateApplications', ['realEstateApplications' => $view->viewRealEstateApplications])
        </div>
    </div>
</div>

@endsection