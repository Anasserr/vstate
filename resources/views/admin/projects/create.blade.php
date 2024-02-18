@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.project.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.project.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.project.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.project.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="images">{{ trans('cruds.project.fields.images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                </div>
                @if($errors->has('images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.project.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.project.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lang">{{ trans('cruds.project.fields.lang') }}</label>
                <input class="form-control {{ $errors->has('lang') ? 'is-invalid' : '' }}" type="text" name="lang" id="lang" value="{{ old('lang', '') }}">
                @if($errors->has('lang'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lang') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location_link">{{ trans('cruds.project.fields.location_link') }}</label>
                <textarea class="form-control {{ $errors->has('location_link') ? 'is-invalid' : '' }}" name="location_link" id="location_link">{{ old('location_link') }}</textarea>
                @if($errors->has('location_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.location_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.project.fields.video') }}</label>
                <div class="needsclick dropzone {{ $errors->has('video') ? 'is-invalid' : '' }}" id="video-dropzone">
                </div>
                @if($errors->has('video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="addresse">{{ trans('cruds.project.fields.addresse') }}</label>
                <input class="form-control {{ $errors->has('addresse') ? 'is-invalid' : '' }}" type="text" name="addresse" id="addresse" value="{{ old('addresse', '') }}">
                @if($errors->has('addresse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('addresse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.addresse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city_id">{{ trans('cruds.project.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id">
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nearbies">{{ trans('cruds.project.fields.nearby') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('nearbies') ? 'is-invalid' : '' }}" name="nearbies[]" id="nearbies" multiple>
                    @foreach($nearbies as $id => $nearby)
                        <option value="{{ $id }}" {{ in_array($id, old('nearbies', [])) ? 'selected' : '' }}>{{ $nearby }}</option>
                    @endforeach
                </select>
                @if($errors->has('nearbies'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nearbies') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.nearby_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.project.fields.featured') }}</label>
                @foreach(App\Models\Project::FEATURED_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('featured') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="featured_{{ $key }}" name="featured" value="{{ $key }}" {{ old('featured', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('featured'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.featured_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_type_id">{{ trans('cruds.project.fields.project_type') }}</label>
                <select class="form-control select2 {{ $errors->has('project_type') ? 'is-invalid' : '' }}" name="project_type_id" id="project_type_id">
                    @foreach($project_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="brochure">{{ trans('cruds.project.fields.brochure') }}</label>
                <div class="needsclick dropzone {{ $errors->has('brochure') ? 'is-invalid' : '' }}" id="brochure-dropzone">
                </div>
                @if($errors->has('brochure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brochure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.brochure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plan_title">{{ trans('cruds.project.fields.plan_title') }}</label>
                <input class="form-control {{ $errors->has('plan_title') ? 'is-invalid' : '' }}" type="text" name="plan_title" id="plan_title" value="{{ old('plan_title', '') }}">
                @if($errors->has('plan_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.plan_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plan_image">{{ trans('cruds.project.fields.plan_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('plan_image') ? 'is-invalid' : '' }}" id="plan_image-dropzone">
                </div>
                @if($errors->has('plan_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.plan_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="construction_updates_images">{{ trans('cruds.project.fields.construction_updates_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('construction_updates_images') ? 'is-invalid' : '' }}" id="construction_updates_images-dropzone">
                </div>
                @if($errors->has('construction_updates_images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('construction_updates_images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.construction_updates_images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="construction_updates_videos">{{ trans('cruds.project.fields.construction_updates_videos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('construction_updates_videos') ? 'is-invalid' : '' }}" id="construction_updates_videos-dropzone">
                </div>
                @if($errors->has('construction_updates_videos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('construction_updates_videos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.construction_updates_videos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="second_title">{{ trans('cruds.project.fields.second_title') }}</label>
                <input class="form-control {{ $errors->has('second_title') ? 'is-invalid' : '' }}" type="text" name="second_title" id="second_title" value="{{ old('second_title', '') }}">
                @if($errors->has('second_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('second_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.second_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="second_description">{{ trans('cruds.project.fields.second_description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('second_description') ? 'is-invalid' : '' }}" name="second_description" id="second_description">{!! old('second_description') !!}</textarea>
                @if($errors->has('second_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('second_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.second_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="second_image">{{ trans('cruds.project.fields.second_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('second_image') ? 'is-invalid' : '' }}" id="second_image-dropzone">
                </div>
                @if($errors->has('second_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('second_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.second_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plan_description">{{ trans('cruds.project.fields.plan_description') }}</label>
                <input class="form-control {{ $errors->has('plan_description') ? 'is-invalid' : '' }}" type="text" name="plan_description" id="plan_description" value="{{ old('plan_description', '') }}">
                @if($errors->has('plan_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plan_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.plan_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banners">{{ trans('cruds.project.fields.banners') }}</label>
                <div class="needsclick dropzone {{ $errors->has('banners') ? 'is-invalid' : '' }}" id="banners-dropzone">
                </div>
                @if($errors->has('banners'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banners') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.banners_helper') }}</span>
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
    url: '{{ route('admin.projects.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->image)
      var file = {!! json_encode($project->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
    success: function (file, response) {
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
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
    init: function () {
@if(isset($project) && $project->images)
      var files = {!! json_encode($project->images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
        }
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
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 22, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 22
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->attachments)
          var files =
            {!! json_encode($project->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.projects.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $project->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedVideoMap = {}
Dropzone.options.videoDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 22, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 22
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="video[]" value="' + response.name + '">')
      uploadedVideoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedVideoMap[file.name]
      }
      $('form').find('input[name="video[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->video)
          var files =
            {!! json_encode($project->video) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="video[]" value="' + file.file_name + '">')
            }
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
    Dropzone.options.brochureDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="brochure"]').remove()
      $('form').append('<input type="hidden" name="brochure" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="brochure"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->brochure)
      var file = {!! json_encode($project->brochure) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="brochure" value="' + file.file_name + '">')
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
    Dropzone.options.planImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
      $('form').find('input[name="plan_image"]').remove()
      $('form').append('<input type="hidden" name="plan_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="plan_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->plan_image)
      var file = {!! json_encode($project->plan_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="plan_image" value="' + file.file_name + '">')
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
    var uploadedConstructionUpdatesImagesMap = {}
Dropzone.options.constructionUpdatesImagesDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
    success: function (file, response) {
      $('form').append('<input type="hidden" name="construction_updates_images[]" value="' + response.name + '">')
      uploadedConstructionUpdatesImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedConstructionUpdatesImagesMap[file.name]
      }
      $('form').find('input[name="construction_updates_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->construction_updates_images)
      var files = {!! json_encode($project->construction_updates_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="construction_updates_images[]" value="' + file.file_name + '">')
        }
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
    var uploadedConstructionUpdatesVideosMap = {}
Dropzone.options.constructionUpdatesVideosDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
    maxFilesize: 22, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 22
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="construction_updates_videos[]" value="' + response.name + '">')
      uploadedConstructionUpdatesVideosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedConstructionUpdatesVideosMap[file.name]
      }
      $('form').find('input[name="construction_updates_videos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->construction_updates_videos)
          var files =
            {!! json_encode($project->construction_updates_videos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="construction_updates_videos[]" value="' + file.file_name + '">')
            }
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
    Dropzone.options.secondImageDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
      $('form').find('input[name="second_image"]').remove()
      $('form').append('<input type="hidden" name="second_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="second_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($project) && $project->second_image)
      var file = {!! json_encode($project->second_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="second_image" value="' + file.file_name + '">')
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
    var uploadedBannersMap = {}
Dropzone.options.bannersDropzone = {
    url: '{{ route('admin.projects.storeMedia') }}',
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
    success: function (file, response) {
      $('form').append('<input type="hidden" name="banners[]" value="' + response.name + '">')
      uploadedBannersMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBannersMap[file.name]
      }
      $('form').find('input[name="banners[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($project) && $project->banners)
      var files = {!! json_encode($project->banners) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="banners[]" value="' + file.file_name + '">')
        }
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