@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.roles.update', [$role->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', $role->title) }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                        name="permissions[]" id="permissions" multiple required>
                        @foreach ($permissions as $id => $permission)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('permissions', [])) || $role->permissions->contains($id) ? 'selected' : '' }}>
                                {{ $permission }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('permissions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('permissions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('show_in_website') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="show_in_website" value="0">
                        <input class="form-check-input" type="checkbox" name="show_in_website" id="show_in_website"
                            value="1"
                            {{ $role->show_in_website || old('show_in_website', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="show_in_website">{{ trans('cruds.role.fields.show_in_website') }}</label>
                    </div>
                    @if ($errors->has('show_in_website'))
                        <div class="invalid-feedback">
                            {{ $errors->first('show_in_website') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.show_in_website_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.role.fields.active') }}</label>
                    @foreach (App\Models\Role::ACTIVE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="active_{{ $key }}" name="active"
                                value="{{ $key }}"
                                {{ old('active', $role->active) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="active_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.active_helper') }}</span>
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
