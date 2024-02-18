@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.realEstateApplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.real-estate-applications.update", [$realEstateApplication->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="addresse">{{ trans('cruds.realEstateApplication.fields.addresse') }}</label>
                <input class="form-control {{ $errors->has('addresse') ? 'is-invalid' : '' }}" type="text" name="addresse" id="addresse" value="{{ old('addresse', $realEstateApplication->addresse) }}">
                @if($errors->has('addresse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('addresse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.addresse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.realEstateApplication.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $realEstateApplication->location) }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_price">{{ trans('cruds.realEstateApplication.fields.max_price') }}</label>
                <input class="form-control {{ $errors->has('max_price') ? 'is-invalid' : '' }}" type="number" name="max_price" id="max_price" value="{{ old('max_price', $realEstateApplication->max_price) }}" step="0.01">
                @if($errors->has('max_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.max_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min_price">{{ trans('cruds.realEstateApplication.fields.min_price') }}</label>
                <input class="form-control {{ $errors->has('min_price') ? 'is-invalid' : '' }}" type="number" name="min_price" id="min_price" value="{{ old('min_price', $realEstateApplication->min_price) }}" step="0.01">
                @if($errors->has('min_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.min_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deliver_year">{{ trans('cruds.realEstateApplication.fields.deliver_year') }}</label>
                <input class="form-control {{ $errors->has('deliver_year') ? 'is-invalid' : '' }}" type="text" name="deliver_year" id="deliver_year" value="{{ old('deliver_year', $realEstateApplication->deliver_year) }}">
                @if($errors->has('deliver_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deliver_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.deliver_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_rooms">{{ trans('cruds.realEstateApplication.fields.number_of_rooms') }}</label>
                <input class="form-control {{ $errors->has('number_of_rooms') ? 'is-invalid' : '' }}" type="text" name="number_of_rooms" id="number_of_rooms" value="{{ old('number_of_rooms', $realEstateApplication->number_of_rooms) }}">
                @if($errors->has('number_of_rooms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_rooms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.number_of_rooms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor">{{ trans('cruds.realEstateApplication.fields.floor') }}</label>
                <input class="form-control {{ $errors->has('floor') ? 'is-invalid' : '' }}" type="text" name="floor" id="floor" value="{{ old('floor', $realEstateApplication->floor) }}">
                @if($errors->has('floor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.floor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_name">{{ trans('cruds.realEstateApplication.fields.user_name') }}</label>
                <input class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}" type="text" name="user_name" id="user_name" value="{{ old('user_name', $realEstateApplication->user_name) }}">
                @if($errors->has('user_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.user_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_phone">{{ trans('cruds.realEstateApplication.fields.user_phone') }}</label>
                <input class="form-control {{ $errors->has('user_phone') ? 'is-invalid' : '' }}" type="text" name="user_phone" id="user_phone" value="{{ old('user_phone', $realEstateApplication->user_phone) }}">
                @if($errors->has('user_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.user_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.realEstateApplication.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $realEstateApplication->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_of_call">{{ trans('cruds.realEstateApplication.fields.time_of_call') }}</label>
                <input class="form-control {{ $errors->has('time_of_call') ? 'is-invalid' : '' }}" type="text" name="time_of_call" id="time_of_call" value="{{ old('time_of_call', $realEstateApplication->time_of_call) }}">
                @if($errors->has('time_of_call'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_of_call') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.time_of_call_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.realEstateApplication.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $realEstateApplication->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.realEstateApplication.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $realEstateApplication->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listings_available_for_mortgages">{{ trans('cruds.realEstateApplication.fields.listings_available_for_mortgage') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('listings_available_for_mortgages') ? 'is-invalid' : '' }}" name="listings_available_for_mortgages[]" id="listings_available_for_mortgages" multiple>
                    @foreach($listings_available_for_mortgages as $id => $listings_available_for_mortgage)
                        <option value="{{ $id }}" {{ (in_array($id, old('listings_available_for_mortgages', [])) || $realEstateApplication->listings_available_for_mortgages->contains($id)) ? 'selected' : '' }}>{{ $listings_available_for_mortgage }}</option>
                    @endforeach
                </select>
                @if($errors->has('listings_available_for_mortgages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listings_available_for_mortgages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.listings_available_for_mortgage_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.realEstateApplication.fields.purpose_of_request') }}</label>
                <select class="form-control {{ $errors->has('purpose_of_request') ? 'is-invalid' : '' }}" name="purpose_of_request" id="purpose_of_request">
                    <option value disabled {{ old('purpose_of_request', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RealEstateApplication::PURPOSE_OF_REQUEST_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('purpose_of_request', $realEstateApplication->purpose_of_request) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('purpose_of_request'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purpose_of_request') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.purpose_of_request_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_methods">{{ trans('cruds.realEstateApplication.fields.payment_method') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('payment_methods') ? 'is-invalid' : '' }}" name="payment_methods[]" id="payment_methods" multiple>
                    @foreach($payment_methods as $id => $payment_method)
                        <option value="{{ $id }}" {{ (in_array($id, old('payment_methods', [])) || $realEstateApplication->payment_methods->contains($id)) ? 'selected' : '' }}>{{ $payment_method }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_methods'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_methods') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="types">{{ trans('cruds.realEstateApplication.fields.type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]" id="types" multiple>
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ (in_array($id, old('types', [])) || $realEstateApplication->types->contains($id)) ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="views">{{ trans('cruds.realEstateApplication.fields.view') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('views') ? 'is-invalid' : '' }}" name="views[]" id="views" multiple>
                    @foreach($views as $id => $view)
                        <option value="{{ $id }}" {{ (in_array($id, old('views', [])) || $realEstateApplication->views->contains($id)) ? 'selected' : '' }}>{{ $view }}</option>
                    @endforeach
                </select>
                @if($errors->has('views'))
                    <div class="invalid-feedback">
                        {{ $errors->first('views') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.view_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finish_types">{{ trans('cruds.realEstateApplication.fields.finish_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('finish_types') ? 'is-invalid' : '' }}" name="finish_types[]" id="finish_types" multiple>
                    @foreach($finish_types as $id => $finish_type)
                        <option value="{{ $id }}" {{ (in_array($id, old('finish_types', [])) || $realEstateApplication->finish_types->contains($id)) ? 'selected' : '' }}>{{ $finish_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('finish_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finish_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.finish_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="min_area">{{ trans('cruds.realEstateApplication.fields.min_area') }}</label>
                <input class="form-control {{ $errors->has('min_area') ? 'is-invalid' : '' }}" type="text" name="min_area" id="min_area" value="{{ old('min_area', $realEstateApplication->min_area) }}">
                @if($errors->has('min_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.min_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_area">{{ trans('cruds.realEstateApplication.fields.max_area') }}</label>
                <input class="form-control {{ $errors->has('max_area') ? 'is-invalid' : '' }}" type="text" name="max_area" id="max_area" value="{{ old('max_area', $realEstateApplication->max_area) }}">
                @if($errors->has('max_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.realEstateApplication.fields.max_area_helper') }}</span>
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