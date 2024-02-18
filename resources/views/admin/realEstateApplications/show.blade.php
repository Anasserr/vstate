@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realEstateApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.addresse') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->addresse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.location') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.max_price') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->max_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.min_price') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->min_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.deliver_year') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->deliver_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.number_of_rooms') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->number_of_rooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.floor') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->floor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.user_name') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->user_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.user_phone') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->user_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.notes') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.time_of_call') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->time_of_call }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.email') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.user') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.listings_available_for_mortgage') }}
                        </th>
                        <td>
                            @foreach($realEstateApplication->listings_available_for_mortgages as $key => $listings_available_for_mortgage)
                                <span class="label label-info">{{ $listings_available_for_mortgage->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.purpose_of_request') }}
                        </th>
                        <td>
                            {{ App\Models\RealEstateApplication::PURPOSE_OF_REQUEST_SELECT[$realEstateApplication->purpose_of_request] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.payment_method') }}
                        </th>
                        <td>
                            @foreach($realEstateApplication->payment_methods as $key => $payment_method)
                                <span class="label label-info">{{ $payment_method->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.type') }}
                        </th>
                        <td>
                            @foreach($realEstateApplication->types as $key => $type)
                                <span class="label label-info">{{ $type->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.view') }}
                        </th>
                        <td>
                            @foreach($realEstateApplication->views as $key => $view)
                                <span class="label label-info">{{ $view->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.finish_type') }}
                        </th>
                        <td>
                            @foreach($realEstateApplication->finish_types as $key => $finish_type)
                                <span class="label label-info">{{ $finish_type->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.min_area') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->min_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.max_area') }}
                        </th>
                        <td>
                            {{ $realEstateApplication->max_area }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.real-estate-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection