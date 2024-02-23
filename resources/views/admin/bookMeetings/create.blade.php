@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.bookMeeting.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.book-meetings.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.bookMeeting.fields.date') }}</label>
                    <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                        name="date" id="date" value="{{ old('date') }}" required>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.bookMeeting.fields.meeting_type') }}</label>
                    <select class="form-control {{ $errors->has('meeting_type') ? 'is-invalid' : '' }}" name="meeting_type"
                        id="meeting_type">
                        <option value disabled {{ old('meeting_type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\BookMeeting::MEETING_TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('meeting_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('meeting_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meeting_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.meeting_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.bookMeeting.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="email">{{ trans('cruds.bookMeeting.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                        name="email" id="email" value="{{ old('email', '') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="phone">{{ trans('cruds.bookMeeting.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                        name="phone" id="phone" value="{{ old('phone', '') }}" required>
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="message">{{ trans('cruds.bookMeeting.fields.message') }}</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.message_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.bookMeeting.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id">
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="unit_id">{{ trans('cruds.bookMeeting.fields.unit') }}</label>
                    <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id"
                        id="unit_id">
                        @foreach ($units as $id => $entry)
                            <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unit'))
                        <div class="invalid-feedback">
                            {{ $errors->first('unit') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.unit_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="project_id">{{ trans('cruds.bookMeeting.fields.project') }}</label>
                    <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}"
                        name="project_id" id="project_id">
                        @foreach ($projects as $id => $entry)
                            <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('project'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.bookMeeting.fields.project_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
