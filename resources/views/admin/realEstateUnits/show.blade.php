@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realEstateUnit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.id') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.title') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.description') }}
                        </th>
                        <td>
                            {!! $realEstateUnit->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RealEstateUnit::STATUS_SELECT[$realEstateUnit->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.price') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.project') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->project->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.image') }}
                        </th>
                        <td>
                            @if($realEstateUnit->image)
                                <a href="{{ $realEstateUnit->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $realEstateUnit->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.images') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.plans') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->plans as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.image_360') }}
                        </th>
                        <td>
                            @if($realEstateUnit->image_360)
                                <a href="{{ $realEstateUnit->image_360->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $realEstateUnit->image_360->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.user') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.featured') }}
                        </th>
                        <td>
                            {{ App\Models\RealEstateUnit::FEATURED_RADIO[$realEstateUnit->featured] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.premium') }}
                        </th>
                        <td>
                            {{ App\Models\RealEstateUnit::PREMIUM_RADIO[$realEstateUnit->premium] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.images_360') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->images_360 as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.location_link') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->location_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.lat') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.lang') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->lang }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.number_of_room') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->number_of_room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.number_of_floor') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->number_of_floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.number_of_bath_room') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->number_of_bath_room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.number_of_master_room') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->number_of_master_room }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.notes') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.has_garage') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $realEstateUnit->has_garage ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.number_of_garage') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->number_of_garage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.amenitie') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->amenities as $key => $amenitie)
                                <span class="label label-info">{{ $amenitie->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.features') }}
                        </th>
                        <td>
                            {!! $realEstateUnit->features !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.purpose') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->purposes as $key => $purpose)
                                <span class="label label-info">{{ $purpose->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.payment') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->payments as $key => $payment)
                                <span class="label label-info">{{ $payment->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.type') }}
                        </th>
                        <td>
                            @foreach($realEstateUnit->types as $key => $type)
                                <span class="label label-info">{{ $type->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.address') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.bua') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->bua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.ror') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->ror }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.roi') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->roi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.city') }}
                        </th>
                        <td>
                            {{ $realEstateUnit->city->title_ar ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#unit_book_meetings" role="tab" data-toggle="tab">
                {{ trans('cruds.bookMeeting.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#unit_likes" role="tab" data-toggle="tab">
                {{ trans('cruds.like.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#unit_unit_comments" role="tab" data-toggle="tab">
                {{ trans('cruds.unitComment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="unit_book_meetings">
            @includeIf('admin.realEstateUnits.relationships.unitBookMeetings', ['bookMeetings' => $realEstateUnit->unitBookMeetings])
        </div>
        <div class="tab-pane" role="tabpanel" id="unit_likes">
            @includeIf('admin.realEstateUnits.relationships.unitLikes', ['likes' => $realEstateUnit->unitLikes])
        </div>
        <div class="tab-pane" role="tabpanel" id="unit_unit_comments">
            @includeIf('admin.realEstateUnits.relationships.unitUnitComments', ['unitComments' => $realEstateUnit->unitUnitComments])
        </div>
    </div>
</div>

@endsection