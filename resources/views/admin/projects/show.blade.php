@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.title') }}
                        </th>
                        <td>
                            {{ $project->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $project->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.user') }}
                        </th>
                        <td>
                            {{ $project->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.image') }}
                        </th>
                        <td>
                            @if($project->image)
                                <a href="{{ $project->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.images') }}
                        </th>
                        <td>
                            @foreach($project->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($project->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Project::STATUS_SELECT[$project->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.lat') }}
                        </th>
                        <td>
                            {{ $project->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.lang') }}
                        </th>
                        <td>
                            {{ $project->lang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.location_link') }}
                        </th>
                        <td>
                            {{ $project->location_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {!! $project->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.video') }}
                        </th>
                        <td>
                            @foreach($project->video as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.addresse') }}
                        </th>
                        <td>
                            {{ $project->addresse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.city') }}
                        </th>
                        <td>
                            {{ $project->city->title_ar ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.nearby') }}
                        </th>
                        <td>
                            @foreach($project->nearbies as $key => $nearby)
                                <span class="label label-info">{{ $nearby->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.featured') }}
                        </th>
                        <td>
                            {{ App\Models\Project::FEATURED_RADIO[$project->featured] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_type') }}
                        </th>
                        <td>
                            {{ $project->project_type->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.brochure') }}
                        </th>
                        <td>
                            @if($project->brochure)
                                <a href="{{ $project->brochure->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.plan_title') }}
                        </th>
                        <td>
                            {{ $project->plan_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.plan_image') }}
                        </th>
                        <td>
                            @if($project->plan_image)
                                <a href="{{ $project->plan_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->plan_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.construction_updates_images') }}
                        </th>
                        <td>
                            @foreach($project->construction_updates_images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.construction_updates_videos') }}
                        </th>
                        <td>
                            @foreach($project->construction_updates_videos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.second_title') }}
                        </th>
                        <td>
                            {{ $project->second_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.second_description') }}
                        </th>
                        <td>
                            {!! $project->second_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.second_image') }}
                        </th>
                        <td>
                            @if($project->second_image)
                                <a href="{{ $project->second_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->second_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.plan_description') }}
                        </th>
                        <td>
                            {{ $project->plan_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.banners') }}
                        </th>
                        <td>
                            @foreach($project->banners as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
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
            <a class="nav-link" href="#project_real_estate_units" role="tab" data-toggle="tab">
                {{ trans('cruds.realEstateUnit.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_book_meetings" role="tab" data-toggle="tab">
                {{ trans('cruds.bookMeeting.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="project_real_estate_units">
            @includeIf('admin.projects.relationships.projectRealEstateUnits', ['realEstateUnits' => $project->projectRealEstateUnits])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_book_meetings">
            @includeIf('admin.projects.relationships.projectBookMeetings', ['bookMeetings' => $project->projectBookMeetings])
        </div>
    </div>
</div>

@endsection