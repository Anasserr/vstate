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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-unitBookMeetings">
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
                <tbody>
                    @foreach ($bookMeetings as $key => $bookMeeting)
                        <tr data-entry-id="{{ $bookMeeting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bookMeeting->id ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BookMeeting::MEETING_TYPE_SELECT[$bookMeeting->meeting_type] ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->name ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->email ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->phone ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->message ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->unit->title ?? '' }}
                            </td>
                            <td>
                                {{ $bookMeeting->project->title ?? '' }}
                            </td>
                            <td>
                                @can('book_meeting_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.book-meetings.show', $bookMeeting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('book_meeting_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.book-meetings.edit', $bookMeeting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('book_meeting_delete')
                                    <form class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                                        action="{{ route('admin.book-meetings.destroy', $bookMeeting->id) }}"
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
            @can('book_meeting_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.book-meetings.massDestroy') }}",
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
            let table = $('.datatable-unitBookMeetings:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
