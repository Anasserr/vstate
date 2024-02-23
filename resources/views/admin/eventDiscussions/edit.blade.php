@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.eventDiscussion.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.event-discussions.update', [$eventDiscussion->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="user_id">{{ trans('cruds.eventDiscussion.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id" required>
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('user_id') ? old('user_id') : $eventDiscussion->user->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.eventDiscussion.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="event_id">{{ trans('cruds.eventDiscussion.fields.event') }}</label>
                    <select class="form-control select2 {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event_id"
                        id="event_id">
                        @foreach ($events as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('event_id') ? old('event_id') : $eventDiscussion->event->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('event'))
                        <div class="invalid-feedback">
                            {{ $errors->first('event') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.eventDiscussion.fields.event_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="discussion">{{ trans('cruds.eventDiscussion.fields.discussion') }}</label>
                    <textarea class="form-control {{ $errors->has('discussion') ? 'is-invalid' : '' }}" name="discussion" id="discussion">{{ old('discussion', $eventDiscussion->discussion) }}</textarea>
                    @if ($errors->has('discussion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('discussion') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.eventDiscussion.fields.discussion_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="replay_discussion_id">{{ trans('cruds.eventDiscussion.fields.replay_discussion') }}</label>
                    <select class="form-control select2 {{ $errors->has('replay_discussion') ? 'is-invalid' : '' }}"
                        name="replay_discussion_id" id="replay_discussion_id">
                        @foreach ($replay_discussions as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('replay_discussion_id') ? old('replay_discussion_id') : $eventDiscussion->replay_discussion->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('replay_discussion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('replay_discussion') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.eventDiscussion.fields.replay_discussion_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('cruds.eventDiscussion.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.eventDiscussion.fields.image_helper') }}</span>
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
            url: '{{ route('admin.event-discussions.storeMedia') }}',
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
                @if (isset($eventDiscussion) && $eventDiscussion->image)
                    var file = {!! json_encode($eventDiscussion->image) !!}
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
