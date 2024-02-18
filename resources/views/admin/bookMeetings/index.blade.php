@extends('layouts.admin')
@section('content')
@can('book_meeting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.book-meetings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bookMeeting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bookMeeting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BookMeeting">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.meeting_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.message') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.unit') }}
                    </th>
                    <th>
                        {{ trans('cruds.bookMeeting.fields.project') }}
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
@can('book_meeting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.book-meetings.massDestroy') }}",
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
    ajax: "{{ route('admin.book-meetings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'date', name: 'date' },
{ data: 'meeting_type', name: 'meeting_type' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'message', name: 'message' },
{ data: 'user_name', name: 'user.name' },
{ data: 'unit_title', name: 'unit.title' },
{ data: 'project_title', name: 'project.title' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BookMeeting').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection