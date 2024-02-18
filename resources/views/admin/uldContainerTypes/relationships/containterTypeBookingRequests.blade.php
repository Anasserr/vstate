@can('booking_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.booking-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bookingRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.bookingRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-containterTypeBookingRequests">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.company_line') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.delivert_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.quantity_of_containers') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.from_port') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.to_port') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.ready_to_load') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.additional_information') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.associated_service') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.accept_terms') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.bulk_discharging_rate') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStatus.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.bookingRequest.fields.requester_type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookingRequests as $key => $bookingRequest)
                        <tr data-entry-id="{{ $bookingRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bookingRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->company_line->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->company_line->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->product->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->delivert_type->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->quantity_of_containers ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->weight ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->from_port->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->to_port->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->ready_to_load ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->additional_information ?? '' }}
                            </td>
                            <td>
                                @foreach($bookingRequest->associated_services as $key => $item)
                                    <span class="badge badge-info">{{ $item->title_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Models\BookingRequest::ACCEPT_TERMS_RADIO[$bookingRequest->accept_terms] ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->phone ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->bulk_discharging_rate ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->status->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $bookingRequest->status->title_en ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BookingRequest::REQUESTER_TYPE_RADIO[$bookingRequest->requester_type] ?? '' }}
                            </td>
                            <td>
                                @can('booking_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.booking-requests.show', $bookingRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('booking_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.booking-requests.edit', $bookingRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('booking_request_delete')
                                    <form action="{{ route('admin.booking-requests.destroy', $bookingRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('booking_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.booking-requests.massDestroy') }}",
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
  let table = $('.datatable-containterTypeBookingRequests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection