@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.eventDiscussion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-discussions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.id') }}
                        </th>
                        <td>
                            {{ $eventDiscussion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.user') }}
                        </th>
                        <td>
                            {{ $eventDiscussion->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.event') }}
                        </th>
                        <td>
                            {{ $eventDiscussion->event->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.discussion') }}
                        </th>
                        <td>
                            {{ $eventDiscussion->discussion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.replay_discussion') }}
                        </th>
                        <td>
                            {{ $eventDiscussion->replay_discussion->discussion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.eventDiscussion.fields.image') }}
                        </th>
                        <td>
                            @if($eventDiscussion->image)
                                <a href="{{ $eventDiscussion->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $eventDiscussion->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.event-discussions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection