@can('requester_user_information_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.requester-user-informations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requesterUserInformation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.requesterUserInformation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-bookingRequestRequesterUserInformations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.phonecode') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.requester_user_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserType.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.requesterUserInformation.fields.lang') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requesterUserInformations as $key => $requesterUserInformation)
                        <tr data-entry-id="{{ $requesterUserInformation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requesterUserInformation->id ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->name ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->email ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->company ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->phonecode ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->phone ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->requester_user_type->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->requester_user_type->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->lat ?? '' }}
                            </td>
                            <td>
                                {{ $requesterUserInformation->lang ?? '' }}
                            </td>
                            <td>
                                @can('requester_user_information_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.requester-user-informations.show', $requesterUserInformation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('requester_user_information_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.requester-user-informations.edit', $requesterUserInformation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('requester_user_information_delete')
                                    <form action="{{ route('admin.requester-user-informations.destroy', $requesterUserInformation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('requester_user_information_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.requester-user-informations.massDestroy') }}",
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
  let table = $('.datatable-bookingRequestRequesterUserInformations:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection