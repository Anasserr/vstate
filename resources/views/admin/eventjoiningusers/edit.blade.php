@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.eventjoininguser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.eventjoiningusers.update", [$eventjoininguser->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('block') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="block" value="0">
                    <input class="form-check-input" type="checkbox" name="block" id="block" value="1" {{ $eventjoininguser->block || old('block', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="block">{{ trans('cruds.eventjoininguser.fields.block') }}</label>
                </div>
                @if($errors->has('block'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventjoininguser.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_id">{{ trans('cruds.eventjoininguser.fields.event') }}</label>
                <select class="form-control select2 {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event_id" id="event_id" required>
                    @foreach($events as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_id') ? old('event_id') : $eventjoininguser->event->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventjoininguser.fields.event_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.eventjoininguser.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $eventjoininguser->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventjoininguser.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_status_id">{{ trans('cruds.eventjoininguser.fields.event_status') }}</label>
                <select class="form-control select2 {{ $errors->has('event_status') ? 'is-invalid' : '' }}" name="event_status_id" id="event_status_id" required>
                    @foreach($event_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_status_id') ? old('event_status_id') : $eventjoininguser->event_status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.eventjoininguser.fields.event_status_helper') }}</span>
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