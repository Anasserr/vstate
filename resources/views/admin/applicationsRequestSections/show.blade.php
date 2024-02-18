@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.applicationsRequestSection.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications-request-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationsRequestSection.fields.id') }}
                        </th>
                        <td>
                            {{ $applicationsRequestSection->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationsRequestSection.fields.title') }}
                        </th>
                        <td>
                            {{ $applicationsRequestSection->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationsRequestSection.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $applicationsRequestSection->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicationsRequestSection.fields.image') }}
                        </th>
                        <td>
                            @if($applicationsRequestSection->image)
                                <a href="{{ $applicationsRequestSection->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $applicationsRequestSection->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications-request-sections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection