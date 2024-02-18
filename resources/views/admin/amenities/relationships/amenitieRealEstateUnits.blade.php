@can('real_estate_unit_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.real-estate-units.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realEstateUnit.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.realEstateUnit.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-amenitieRealEstateUnits">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.featured') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.premium') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.images_360') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.near') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.purpose') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.ror') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.roi') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateUnit.fields.city') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realEstateUnits as $key => $realEstateUnit)
                        <tr data-entry-id="{{ $realEstateUnit->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realEstateUnit->id ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateUnit->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealEstateUnit::STATUS_SELECT[$realEstateUnit->status] ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateUnit->price ?? '' }}
                            </td>
                            <td>
                                @if($realEstateUnit->image)
                                    <a href="{{ $realEstateUnit->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $realEstateUnit->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $realEstateUnit->user->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealEstateUnit::FEATURED_RADIO[$realEstateUnit->featured] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RealEstateUnit::PREMIUM_RADIO[$realEstateUnit->premium] ?? '' }}
                            </td>
                            <td>
                                @foreach($realEstateUnit->images_360 as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $realEstateUnit->notes ?? '' }}
                            </td>
                            <td>
                                @foreach($realEstateUnit->nears as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($realEstateUnit->purposes as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($realEstateUnit->payments as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($realEstateUnit->types as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $realEstateUnit->ror ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateUnit->roi ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateUnit->city->title_ar ?? '' }}
                            </td>
                            <td>
                                @can('real_estate_unit_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.real-estate-units.show', $realEstateUnit->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('real_estate_unit_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.real-estate-units.edit', $realEstateUnit->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('real_estate_unit_delete')
                                    <form action="{{ route('admin.real-estate-units.destroy', $realEstateUnit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('real_estate_unit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.real-estate-units.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-amenitieRealEstateUnits:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection