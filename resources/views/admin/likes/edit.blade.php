@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.like.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.likes.update", [$like->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.like.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $like->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.like.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_id">{{ trans('cruds.like.fields.unit') }}</label>
                <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id" id="unit_id">
                    @foreach($units as $id => $entry)
                        <option value="{{ $id }}" {{ (old('unit_id') ? old('unit_id') : $like->unit->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.like.fields.unit_helper') }}</span>
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