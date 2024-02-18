@can('real_estate_application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.real-estate-applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realEstateApplication.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.realEstateApplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-sectionRealEstateApplications">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.addresse') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.max_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.min_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.deliver_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.number_of_rooms') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.floor') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.user_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.user_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.view') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.finish_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.realEstateApplication.fields.section') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realEstateApplications as $key => $realEstateApplication)
                        <tr data-entry-id="{{ $realEstateApplication->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realEstateApplication->id ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->addresse ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->max_price ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->min_price ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->deliver_year ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->number_of_rooms ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->floor ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->user_name ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->user_phone ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->view->title ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->finish_type->title ?? '' }}
                            </td>
                            <td>
                                {{ $realEstateApplication->section->title ?? '' }}
                            </td>
                            <td>
                                @can('real_estate_application_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.real-estate-applications.show', $realEstateApplication->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('real_estate_application_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.real-estate-applications.edit', $realEstateApplication->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('real_estate_application_delete')
                                    <form action="{{ route('admin.real-estate-applications.destroy', $realEstateApplication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('real_estate_application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.real-estate-applications.massDestroy') }}",
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
  let table = $('.datatable-sectionRealEstateApplications:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection