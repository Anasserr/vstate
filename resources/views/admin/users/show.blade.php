@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.image') }}
                        </th>
                        <td>
                            @if($user->image)
                                <a href="{{ $user->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $user->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#user_eventjoiningusers" role="tab" data-toggle="tab">
                {{ trans('cruds.eventjoininguser.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_events" role="tab" data-toggle="tab">
                {{ trans('cruds.event.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_book_meetings" role="tab" data-toggle="tab">
                {{ trans('cruds.bookMeeting.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_likes" role="tab" data-toggle="tab">
                {{ trans('cruds.like.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_unit_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.unitComment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_real_estate_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateApplication.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_eventjoiningusers">
            @includeIf('admin.users.relationships.userEventjoiningusers', ['eventjoiningusers' => $user->userEventjoiningusers])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_events">
            @includeIf('admin.users.relationships.createdByEvents', ['events' => $user->createdByEvents])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_projects">
            @includeIf('admin.users.relationships.userProjects', ['projects' => $user->userProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_real_estate_units">
            @includeIf('admin.users.relationships.userRealEstateUnits', ['realEstateUnits' => $user->userRealEstateUnits])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_book_meetings">
            @includeIf('admin.users.relationships.userBookMeetings', ['bookMeetings' => $user->userBookMeetings])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_likes">
            @includeIf('admin.users.relationships.userLikes', ['likes' => $user->userLikes])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_unit_comments">
            @includeIf('admin.users.relationships.userUnitComments', ['unitComments' => $user->userUnitComments])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_real_estate_applications">
            @includeIf('admin.users.relationships.userRealEstateApplications', ['realEstateApplications' => $user->userRealEstateApplications])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection