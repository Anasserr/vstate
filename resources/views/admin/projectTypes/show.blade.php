@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projectType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectType.fields.id') }}
                        </th>
                        <td>
                            {{ $projectType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectType.fields.title') }}
                        </th>
                        <td>
                            {{ $projectType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectType.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $projectType->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectType.fields.image') }}
                        </th>
                        <td>
                            @if($projectType->image)
                                <a href="{{ $projectType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $projectType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-types.index') }}">
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
            <a class="nav-link" href="#project_type_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="project_type_projects">
            @includeIf('admin.projectTypes.relationships.projectTypeProjects', ['projects' => $projectType->projectTypeProjects])
        </div>
    </div>
</div>

@endsection