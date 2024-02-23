@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.realEstateUnit.title_singular') }}
        </div>

        <div class="card-body">
            <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                action="{{ route('admin.real-estate-units.update', [$realEstateUnit->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.realEstateUnit.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', $realEstateUnit->title) }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.realEstateUnit.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                        id="description">{!! old('description', $realEstateUnit->description) !!}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.realEstateUnit.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\RealEstateUnit::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('status', $realEstateUnit->status) === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="price">{{ trans('cruds.realEstateUnit.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text"
                        name="price" id="price" value="{{ old('price', $realEstateUnit->price) }}">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.price_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="project_id">{{ trans('cruds.realEstateUnit.fields.project') }}</label>
                    <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}"
                        name="project_id" id="project_id">
                        @foreach ($projects as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('project_id') ? old('project_id') : $realEstateUnit->project->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('project'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.project_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image">{{ trans('cruds.realEstateUnit.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="images">{{ trans('cruds.realEstateUnit.fields.images') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                    </div>
                    @if ($errors->has('images'))
                        <div class="invalid-feedback">
                            {{ $errors->first('images') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.images_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="plans">{{ trans('cruds.realEstateUnit.fields.plans') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('plans') ? 'is-invalid' : '' }}" id="plans-dropzone">
                    </div>
                    @if ($errors->has('plans'))
                        <div class="invalid-feedback">
                            {{ $errors->first('plans') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.plans_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="image_360">{{ trans('cruds.realEstateUnit.fields.image_360') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image_360') ? 'is-invalid' : '' }}"
                        id="image_360-dropzone">
                    </div>
                    @if ($errors->has('image_360'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image_360') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.image_360_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="user_id">{{ trans('cruds.realEstateUnit.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id"
                        id="user_id" required>
                        @foreach ($users as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('user_id') ? old('user_id') : $realEstateUnit->user->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.realEstateUnit.fields.featured') }}</label>
                    @foreach (App\Models\RealEstateUnit::FEATURED_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('featured') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="featured_{{ $key }}"
                                name="featured" value="{{ $key }}"
                                {{ old('featured', $realEstateUnit->featured) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('featured'))
                        <div class="invalid-feedback">
                            {{ $errors->first('featured') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.featured_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.realEstateUnit.fields.premium') }}</label>
                    @foreach (App\Models\RealEstateUnit::PREMIUM_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('premium') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="premium_{{ $key }}" name="premium"
                                value="{{ $key }}"
                                {{ old('premium', $realEstateUnit->premium) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="premium_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if ($errors->has('premium'))
                        <div class="invalid-feedback">
                            {{ $errors->first('premium') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.premium_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="images_360">{{ trans('cruds.realEstateUnit.fields.images_360') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('images_360') ? 'is-invalid' : '' }}"
                        id="images_360-dropzone">
                    </div>
                    @if ($errors->has('images_360'))
                        <div class="invalid-feedback">
                            {{ $errors->first('images_360') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.images_360_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="location_link">{{ trans('cruds.realEstateUnit.fields.location_link') }}</label>
                    <textarea class="form-control {{ $errors->has('location_link') ? 'is-invalid' : '' }}" name="location_link"
                        id="location_link">{{ old('location_link', $realEstateUnit->location_link) }}</textarea>
                    @if ($errors->has('location_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.location_link_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="lat">{{ trans('cruds.realEstateUnit.fields.lat') }}</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text"
                        name="lat" id="lat" value="{{ old('lat', $realEstateUnit->lat) }}">
                    @if ($errors->has('lat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lat') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.lat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="lang">{{ trans('cruds.realEstateUnit.fields.lang') }}</label>
                    <input class="form-control {{ $errors->has('lang') ? 'is-invalid' : '' }}" type="text"
                        name="lang" id="lang" value="{{ old('lang', $realEstateUnit->lang) }}">
                    @if ($errors->has('lang'))
                        <div class="invalid-feedback">
                            {{ $errors->first('lang') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.lang_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="number_of_room">{{ trans('cruds.realEstateUnit.fields.number_of_room') }}</label>
                    <input class="form-control {{ $errors->has('number_of_room') ? 'is-invalid' : '' }}" type="text"
                        name="number_of_room" id="number_of_room"
                        value="{{ old('number_of_room', $realEstateUnit->number_of_room) }}">
                    @if ($errors->has('number_of_room'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_room') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.number_of_room_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="number_of_floor">{{ trans('cruds.realEstateUnit.fields.number_of_floor') }}</label>
                    <input class="form-control {{ $errors->has('number_of_floor') ? 'is-invalid' : '' }}" type="text"
                        name="number_of_floor" id="number_of_floor"
                        value="{{ old('number_of_floor', $realEstateUnit->number_of_floor) }}">
                    @if ($errors->has('number_of_floor'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_floor') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.number_of_floor_helper') }}</span>
                </div>
                <div class="form-group">
                    <label
                        for="number_of_bath_room">{{ trans('cruds.realEstateUnit.fields.number_of_bath_room') }}</label>
                    <input class="form-control {{ $errors->has('number_of_bath_room') ? 'is-invalid' : '' }}"
                        type="text" name="number_of_bath_room" id="number_of_bath_room"
                        value="{{ old('number_of_bath_room', $realEstateUnit->number_of_bath_room) }}">
                    @if ($errors->has('number_of_bath_room'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_bath_room') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.number_of_bath_room_helper') }}</span>
                </div>
                <div class="form-group">
                    <label
                        for="number_of_master_room">{{ trans('cruds.realEstateUnit.fields.number_of_master_room') }}</label>
                    <input class="form-control {{ $errors->has('number_of_master_room') ? 'is-invalid' : '' }}"
                        type="text" name="number_of_master_room" id="number_of_master_room"
                        value="{{ old('number_of_master_room', $realEstateUnit->number_of_master_room) }}">
                    @if ($errors->has('number_of_master_room'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_master_room') }}
                        </div>
                    @endif
                    <span
                        class="help-block">{{ trans('cruds.realEstateUnit.fields.number_of_master_room_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="notes">{{ trans('cruds.realEstateUnit.fields.notes') }}</label>
                    <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text"
                        name="notes" id="notes" value="{{ old('notes', $realEstateUnit->notes) }}">
                    @if ($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.notes_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('has_garage') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="has_garage" value="0">
                        <input class="form-check-input" type="checkbox" name="has_garage" id="has_garage"
                            value="1"
                            {{ $realEstateUnit->has_garage || old('has_garage', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="has_garage">{{ trans('cruds.realEstateUnit.fields.has_garage') }}</label>
                    </div>
                    @if ($errors->has('has_garage'))
                        <div class="invalid-feedback">
                            {{ $errors->first('has_garage') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.has_garage_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="number_of_garage">{{ trans('cruds.realEstateUnit.fields.number_of_garage') }}</label>
                    <input class="form-control {{ $errors->has('number_of_garage') ? 'is-invalid' : '' }}"
                        type="text" name="number_of_garage" id="number_of_garage"
                        value="{{ old('number_of_garage', $realEstateUnit->number_of_garage) }}">
                    @if ($errors->has('number_of_garage'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number_of_garage') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.number_of_garage_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="amenities">{{ trans('cruds.realEstateUnit.fields.amenitie') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('amenities') ? 'is-invalid' : '' }}"
                        name="amenities[]" id="amenities" multiple>
                        @foreach ($amenities as $id => $amenity)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('amenities', [])) || $realEstateUnit->amenities->contains($id) ? 'selected' : '' }}>
                                {{ $amenity }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('amenities'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amenities') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.amenitie_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="nears">{{ trans('cruds.realEstateUnit.fields.near') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('nears') ? 'is-invalid' : '' }}" name="nears[]"
                        id="nears" multiple>
                        @foreach ($nears as $id => $near)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('nears', [])) || $realEstateUnit->nears->contains($id) ? 'selected' : '' }}>
                                {{ $near }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nears'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nears') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.near_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="features">{{ trans('cruds.realEstateUnit.fields.features') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('features') ? 'is-invalid' : '' }}" name="features"
                        id="features">{!! old('features', $realEstateUnit->features) !!}</textarea>
                    @if ($errors->has('features'))
                        <div class="invalid-feedback">
                            {{ $errors->first('features') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.features_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="purposes">{{ trans('cruds.realEstateUnit.fields.purpose') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('purposes') ? 'is-invalid' : '' }}"
                        name="purposes[]" id="purposes" multiple>
                        @foreach ($purposes as $id => $purpose)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('purposes', [])) || $realEstateUnit->purposes->contains($id) ? 'selected' : '' }}>
                                {{ $purpose }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('purposes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('purposes') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.purpose_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="payments">{{ trans('cruds.realEstateUnit.fields.payment') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('payments') ? 'is-invalid' : '' }}"
                        name="payments[]" id="payments" multiple>
                        @foreach ($payments as $id => $payment)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('payments', [])) || $realEstateUnit->payments->contains($id) ? 'selected' : '' }}>
                                {{ $payment }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('payments'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payments') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.payment_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="types">{{ trans('cruds.realEstateUnit.fields.type') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]"
                        id="types" multiple>
                        @foreach ($types as $id => $type)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('types', [])) || $realEstateUnit->types->contains($id) ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('types'))
                        <div class="invalid-feedback">
                            {{ $errors->first('types') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.realEstateUnit.fields.address') }}</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $realEstateUnit->address) }}</textarea>
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="bua">{{ trans('cruds.realEstateUnit.fields.bua') }}</label>
                    <input class="form-control {{ $errors->has('bua') ? 'is-invalid' : '' }}" type="text"
                        name="bua" id="bua" value="{{ old('bua', $realEstateUnit->bua) }}">
                    @if ($errors->has('bua'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bua') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.bua_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="ror">{{ trans('cruds.realEstateUnit.fields.ror') }}</label>
                    <input class="form-control {{ $errors->has('ror') ? 'is-invalid' : '' }}" type="text"
                        name="ror" id="ror" value="{{ old('ror', $realEstateUnit->ror) }}">
                    @if ($errors->has('ror'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ror') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.ror_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="roi">{{ trans('cruds.realEstateUnit.fields.roi') }}</label>
                    <input class="form-control {{ $errors->has('roi') ? 'is-invalid' : '' }}" type="text"
                        name="roi" id="roi" value="{{ old('roi', $realEstateUnit->roi) }}">
                    @if ($errors->has('roi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('roi') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.roi_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="city_id">{{ trans('cruds.realEstateUnit.fields.city') }}</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id"
                        id="city_id">
                        @foreach ($cities as $id => $entry)
                            <option value="{{ $id }}"
                                {{ (old('city_id') ? old('city_id') : $realEstateUnit->city->id ?? '') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.realEstateUnit.fields.city_helper') }}</span>
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
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.real-estate-units.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                    );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                            e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id',
                                            '{{ $realEstateUnit->id ?? 0 }}');
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
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.real-estate-units.storeMedia') }}',
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
                @if (isset($realEstateUnit) && $realEstateUnit->image)
                    var file = {!! json_encode($realEstateUnit->image) !!}
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
            url: '{{ route('admin.real-estate-units.storeMedia') }}',
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
                @if (isset($realEstateUnit) && $realEstateUnit->images)
                    var files = {!! json_encode($realEstateUnit->images) !!}
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
    <script>
        var uploadedPlansMap = {}
        Dropzone.options.plansDropzone = {
            url: '{{ route('admin.real-estate-units.storeMedia') }}',
            maxFilesize: 22, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 22
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="plans[]" value="' + response.name + '">')
                uploadedPlansMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPlansMap[file.name]
                }
                $('form').find('input[name="plans[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($realEstateUnit) && $realEstateUnit->plans)
                    var files =
                        {!! json_encode($realEstateUnit->plans) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="plans[]" value="' + file.file_name + '">')
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
    <script>
        Dropzone.options.image360Dropzone = {
            url: '{{ route('admin.real-estate-units.storeMedia') }}',
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
                $('form').find('input[name="image_360"]').remove()
                $('form').append('<input type="hidden" name="image_360" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image_360"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($realEstateUnit) && $realEstateUnit->image_360)
                    var file = {!! json_encode($realEstateUnit->image_360) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image_360" value="' + file.file_name + '">')
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
        var uploadedImages360Map = {}
        Dropzone.options.images360Dropzone = {
            url: '{{ route('admin.real-estate-units.storeMedia') }}',
            maxFilesize: 22, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 22
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="images_360[]" value="' + response.name + '">')
                uploadedImages360Map[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedImages360Map[file.name]
                }
                $('form').find('input[name="images_360[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($realEstateUnit) && $realEstateUnit->images_360)
                    var files =
                        {!! json_encode($realEstateUnit->images_360) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="images_360[]" value="' + file.file_name + '">')
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
