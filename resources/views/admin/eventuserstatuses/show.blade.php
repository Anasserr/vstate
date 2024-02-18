@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventuserstatus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.eventuserstatuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventuserstatus.fields.id') }}
                        </th>
                        <td>
                            {{ $eventuserstatus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventuserstatus.fields.title') }}
                        </th>
                        <td>
                            {{ $eventuserstatus->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventuserstatus.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $eventuserstatus->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.eventuserstatuses.index') }}">
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
            <a class="nav-link" href="#event_status_eventjoiningusers" role="tab" data-toggle="tab">
                {{ trans('cruds.eventjoininguser.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="event_status_eventjoiningusers">
            @includeIf('admin.eventuserstatuses.relationships.eventStatusEventjoiningusers', ['eventjoiningusers' => $eventuserstatus->eventStatusEventjoiningusers])
        </div>
    </div>
</div>

@endsection