@can('companies_line_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.companies-lines.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.companiesLine.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.companiesLine.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-portCompaniesLines">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.title_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.number_of_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.country_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.name_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.city_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.region_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.country_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.name_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.city_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.city.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.start_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.featured') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.show_in_home_page') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.top_image_message_ar') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.company_line_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyLinesStatus.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesLine.fields.port') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companiesLines as $key => $companiesLine)
                        <tr data-entry-id="{{ $companiesLine->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $companiesLine->id ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->title_en ?? '' }}
                            </td>
                            <td>
                                @if($companiesLine->image)
                                    <a href="{{ $companiesLine->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $companiesLine->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $companiesLine->number_of_days ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->weight ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->price ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->country_from->name ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->country_from->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->city_from->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->region_from->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->region_from->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->country_to->name ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->country_to->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->city_to->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->city_to->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->phone ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->start_price ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CompaniesLine::FEATURED_RADIO[$companiesLine->featured] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CompaniesLine::SHOW_IN_HOME_PAGE_RADIO[$companiesLine->show_in_home_page] ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->top_image_message_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->company_line_status->title_ar ?? '' }}
                            </td>
                            <td>
                                {{ $companiesLine->company_line_status->title_en ?? '' }}
                            </td>
                            <td>
                                @foreach($companiesLine->ports as $key => $item)
                                    <span class="badge badge-info">{{ $item->title_ar }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('companies_line_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companies-lines.show', $companiesLine->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('companies_line_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companies-lines.edit', $companiesLine->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('companies_line_delete')
                                    <form action="{{ route('admin.companies-lines.destroy', $companiesLine->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('companies_line_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companies-lines.massDestroy') }}",
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
  let table = $('.datatable-portCompaniesLines:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection