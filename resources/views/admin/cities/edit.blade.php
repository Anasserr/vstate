@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.cities.update', [$city->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title_ar">{{ trans('cruds.city.fields.title_ar') }}</label>
                    <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text"
                        name="title_ar" id="title_ar" value="{{ old('title_ar', $city->title_ar) }}" required>
                    @if ($errors->has('title_ar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_ar') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.city.fields.title_ar_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title_en">{{ trans('cruds.city.fields.title_en') }}</label>
                    <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text"
                        name="title_en" id="title_en" value="{{ old('title_en', $city->title_en) }}" required>
                    @if ($errors->has('title_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_en') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.city.fields.title_en_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="country_id">{{ trans('cruds.city.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                        name="country_id" id="country_id">
                        @foreach ($countries as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('country_id') ? old('country_id') : $city->country->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <div class="invalid-feedback">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.city.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('cruds.city.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.city.fields.image_helper') }}</span>
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
            url: '{{ route('admin.cities.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
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
                @if (isset($city) && $city->image)
                    var file = {!! json_encode($city->image) !!}
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
@endsection
