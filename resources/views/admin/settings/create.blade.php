@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fb">{{ trans('cruds.setting.fields.fb') }}</label>
                <input class="form-control {{ $errors->has('fb') ? 'is-invalid' : '' }}" type="text" name="fb" id="fb" value="{{ old('fb', '') }}">
                @if($errors->has('fb'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fb') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.fb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkin">{{ trans('cruds.setting.fields.linkin') }}</label>
                <input class="form-control {{ $errors->has('linkin') ? 'is-invalid' : '' }}" type="text" name="linkin" id="linkin" value="{{ old('linkin', '') }}">
                @if($errors->has('linkin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.linkin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.setting.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instgram">{{ trans('cruds.setting.fields.instgram') }}</label>
                <input class="form-control {{ $errors->has('instgram') ? 'is-invalid' : '' }}" type="text" name="instgram" id="instgram" value="{{ old('instgram', '') }}">
                @if($errors->has('instgram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instgram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instgram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="snap">{{ trans('cruds.setting.fields.snap') }}</label>
                <input class="form-control {{ $errors->has('snap') ? 'is-invalid' : '' }}" type="text" name="snap" id="snap" value="{{ old('snap', '') }}">
                @if($errors->has('snap'))
                    <div class="invalid-feedback">
                        {{ $errors->first('snap') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.snap_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_title">{{ trans('cruds.setting.fields.site_title') }}</label>
                <input class="form-control {{ $errors->has('site_title') ? 'is-invalid' : '' }}" type="text" name="site_title" id="site_title" value="{{ old('site_title', '') }}">
                @if($errors->has('site_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_white">{{ trans('cruds.setting.fields.logo_white') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo_white') ? 'is-invalid' : '' }}" id="logo_white-dropzone">
                </div>
                @if($errors->has('logo_white'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_white') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_white_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.description_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
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
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
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
    Dropzone.options.logoWhiteDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
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
    success: function (file, response) {
      $('form').find('input[name="logo_white"]').remove()
      $('form').append('<input type="hidden" name="logo_white" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_white"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->logo_white)
      var file = {!! json_encode($setting->logo_white) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_white" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
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