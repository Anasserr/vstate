@extends('layouts.admin')
@section('content')
@can('real_estate_unit_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.real-estate-units.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realEstateUnit.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'RealEstateUnit', 'route' => 'admin.real-estate-units.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realEstateUnit.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RealEstateUnit">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('real_estate_unit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.real-estate-units.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.real-estate-units.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'title', name: 'title' },
{ data: 'status', name: 'status' },
{ data: 'price', name: 'price' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'user_name', name: 'user.name' },
{ data: 'featured', name: 'featured' },
{ data: 'premium', name: 'premium' },
{ data: 'images_360', name: 'images_360', sortable: false, searchable: false },
{ data: 'notes', name: 'notes' },
{ data: 'near', name: 'nears.title' },
{ data: 'purpose', name: 'purposes.title' },
{ data: 'payment', name: 'payments.title' },
{ data: 'type', name: 'types.title' },
{ data: 'ror', name: 'ror' },
{ data: 'roi', name: 'roi' },
{ data: 'city_title_ar', name: 'city.title_ar' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RealEstateUnit').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection