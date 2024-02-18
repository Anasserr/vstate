@extends('layouts.admin')
@section('content')
@can('real_estate_application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.real-estate-applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.realEstateApplication.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'RealEstateApplication', 'route' => 'admin.real-estate-applications.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realEstateApplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RealEstateApplication">
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
                        {{ trans('cruds.realEstateApplication.fields.location') }}
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
                        {{ trans('cruds.realEstateApplication.fields.notes') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.time_of_call') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.listings_available_for_mortgage') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.purpose_of_request') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.payment_method') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.view') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.finish_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.min_area') }}
                    </th>
                    <th>
                        {{ trans('cruds.realEstateApplication.fields.max_area') }}
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
@can('real_estate_application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.real-estate-applications.massDestroy') }}",
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
    ajax: "{{ route('admin.real-estate-applications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'addresse', name: 'addresse' },
{ data: 'location', name: 'location' },
{ data: 'max_price', name: 'max_price' },
{ data: 'min_price', name: 'min_price' },
{ data: 'deliver_year', name: 'deliver_year' },
{ data: 'number_of_rooms', name: 'number_of_rooms' },
{ data: 'floor', name: 'floor' },
{ data: 'user_name', name: 'user_name' },
{ data: 'user_phone', name: 'user_phone' },
{ data: 'notes', name: 'notes' },
{ data: 'time_of_call', name: 'time_of_call' },
{ data: 'email', name: 'email' },
{ data: 'user_name', name: 'user.name' },
{ data: 'listings_available_for_mortgage', name: 'listings_available_for_mortgages.title' },
{ data: 'purpose_of_request', name: 'purpose_of_request' },
{ data: 'payment_method', name: 'payment_methods.title' },
{ data: 'type', name: 'types.title' },
{ data: 'view', name: 'views.title' },
{ data: 'finish_type', name: 'finish_types.title' },
{ data: 'min_area', name: 'min_area' },
{ data: 'max_area', name: 'max_area' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RealEstateApplication').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection