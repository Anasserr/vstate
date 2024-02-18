@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bookMeeting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.book-meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.id') }}
                        </th>
                        <td>
                            {{ $bookMeeting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.date') }}
                        </th>
                        <td>
                            {{ $bookMeeting->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.meeting_type') }}
                        </th>
                        <td>
                            {{ App\Models\BookMeeting::MEETING_TYPE_SELECT[$bookMeeting->meeting_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.name') }}
                        </th>
                        <td>
                            {{ $bookMeeting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.email') }}
                        </th>
                        <td>
                            {{ $bookMeeting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.phone') }}
                        </th>
                        <td>
                            {{ $bookMeeting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.message') }}
                        </th>
                        <td>
                            {{ $bookMeeting->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.user') }}
                        </th>
                        <td>
                            {{ $bookMeeting->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.unit') }}
                        </th>
                        <td>
                            {{ $bookMeeting->unit->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bookMeeting.fields.project') }}
                        </th>
                        <td>
                            {{ $bookMeeting->project->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.book-meetings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection