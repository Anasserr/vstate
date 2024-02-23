@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.event.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                        name="description" id="description" value="{{ old('description', '') }}">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="event_date">{{ trans('cruds.event.fields.event_date') }}</label>
                    <input class="form-control datetime {{ $errors->has('event_date') ? 'is-invalid' : '' }}"
                        type="text" name="event_date" id="event_date" value="{{ old('event_date') }}">
                    @if ($errors->has('event_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('event_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.event_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="addresse">{{ trans('cruds.event.fields.addresse') }}</label>
                    <input class="form-control {{ $errors->has('addresse') ? 'is-invalid' : '' }}" type="text"
                        name="addresse" id="addresse" value="{{ old('addresse', '') }}">
                    @if ($errors->has('addresse'))
                        <div class="invalid-feedback">
                            {{ $errors->first('addresse') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.addresse_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('cruds.event.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="images">{{ trans('cruds.event.fields.images') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                    </div>
                    @if ($errors->has('images'))
                        <div class="invalid-feedback">
                            {{ $errors->first('images') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.images_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="location_link">{{ trans('cruds.event.fields.location_link') }}</label>
                    <input class="form-control {{ $errors->has('location_link') ? 'is-invalid' : '' }}" type="text"
                        name="location_link" id="location_link" value="{{ old('location_link', '') }}">
                    @if ($errors->has('location_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.location_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="lat">{{ trans('cruds.event.fields.lat') }}</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat"
                        id="lat" value="{{ old('lat', '') }}">
                    @if ($errors->has('lat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lat') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.lat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="lang">{{ trans('cruds.event.fields.lang') }}</label>
                    <input class="form-control {{ $errors->has('lang') ? 'is-invalid' : '' }}" type="text"
                        name="lang" id="lang" value="{{ old('lang', '') }}">
                    @if ($errors->has('lang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lang') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.lang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.event.fields.published') }}</label>
                    @foreach (App\Models\Event::PUBLISHED_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="published_{{ $key }}"
                                name="published" value="{{ $key }}"
                                {{ old('published', '') === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="published_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('published'))
                        <div class="invalid-feedback">
                            {{ $errors->first('published') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.published_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.event.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Event::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="event_tags">{{ trans('cruds.event.fields.event_tag') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('event_tags') ? 'is-invalid' : '' }}"
                        name="event_tags[]" id="event_tags" multiple>
                        @foreach ($event_tags as $id => $event_tag)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('event_tags', [])) ? 'selected' : '' }}>{{ $event_tag }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('event_tags'))
                        <div class="invalid-feedback">
                            {{ $errors->first('event_tags') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.event_tag_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="created_by_id">{{ trans('cruds.event.fields.created_by') }}</label>
                    <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}"
                        name="created_by_id" id="created_by_id" required>
                        @foreach ($created_bies as $id => $entry)
                            <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('created_by'))
                        <div class="invalid-feedback">
                            {{ $errors->first('created_by') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.created_by_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="country_id">{{ trans('cruds.event.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                        name="country_id" id="country_id">
                        @foreach ($countries as $id => $entry)
                            <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="city_id">{{ trans('cruds.event.fields.city') }}</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id"
                        id="city_id">
                        @foreach ($cities as $id => $entry)
                            <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.city_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('show_first') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="show_first" value="0">
                        <input class="form-check-input" type="checkbox" name="show_first" id="show_first"
                            value="1" {{ old('show_first', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="show_first">{{ trans('cruds.event.fields.show_first') }}</label>
                    </div>
                    @if ($errors->has('show_first'))
                        <div class="invalid-feedback">
                            {{ $errors->first('show_first') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.event.fields.show_first_helper') }}</span>
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

@section('scripts')
    <script>
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.events.storeMedia') }}',
            maxFilesize: 22, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 22,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($event) && $event->image)
                    var file = {!! json_encode($event->image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
    <script>
        var uploadedImagesMap = {}
        Dropzone.options.imagesDropzone = {
            url: '{{ route('admin.events.storeMedia') }}',
            maxFilesize: 22, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 22,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedImagesMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedImagesMap[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($event) && $event->images)
                    var files = {!! json_encode($event->images) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
