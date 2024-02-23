@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.slider.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.sliders.update', [$slider->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="head_title">{{ trans('cruds.slider.fields.head_title') }}</label>
                    <input class="form-control {{ $errors->has('head_title') ? 'is-invalid' : '' }}" type="text"
                        name="head_title" id="head_title" value="{{ old('head_title', $slider->head_title) }}" required>
                    @if ($errors->has('head_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('head_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.head_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.slider.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                        name="description" id="description" value="{{ old('description', $slider->description) }}">
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="link_title">{{ trans('cruds.slider.fields.link_title') }}</label>
                    <input class="form-control {{ $errors->has('link_title') ? 'is-invalid' : '' }}" type="text"
                        name="link_title" id="link_title" value="{{ old('link_title', $slider->link_title) }}">
                    @if ($errors->has('link_title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link_title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.link_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="link">{{ trans('cruds.slider.fields.link') }}</label>
                    <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text"
                        name="link" id="link" value="{{ old('link', $slider->link) }}">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('cruds.slider.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.image_helper') }}</span>
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
            url: '{{ route('admin.sliders.storeMedia') }}',
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
                @if (isset($slider) && $slider->image)
                    var file = {!! json_encode($slider->image) !!}
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
