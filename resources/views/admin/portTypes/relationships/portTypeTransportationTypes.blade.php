@can('transportation_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transportation-types.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transportationType.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.transportationType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class=" table table-bordered table-striped table-hover datatable datatable-portTypeTransportationTypes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.port_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.delivery_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.transportationType.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transportationTypes as $key => $transportationType)
                        <tr data-entry-id="{{ $transportationType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transportationType->id ?? '' }}
                            </td>
                            <td>
                                {{ $transportationType->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $transportationType->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $transportationType->port_type->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $transportationType->delivery_type->title_ar ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $transportationType->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled"
                                    {{ $transportationType->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('transportation_type_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.transportation-types.show', $transportationType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transportation_type_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.transportation-types.edit', $transportationType->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transportation_type_delete')
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                                        action="{{ route('admin.transportation-types.destroy', $transportationType->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('transportation_type_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.transportation-types.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-portTypeTransportationTypes:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
