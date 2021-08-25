@can('institucione_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.instituciones.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.institucione.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.institucione.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-comunaInstituciones">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.institucione.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.institucione.fields.sector') }}
                        </th>
                        <th>
                            {{ trans('cruds.institucione.fields.nombre_institucion') }}
                        </th>
                        <th>
                            {{ trans('cruds.institucione.fields.comuna') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instituciones as $key => $institucione)
                        <tr data-entry-id="{{ $institucione->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $institucione->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Institucione::SECTOR_SELECT[$institucione->sector] ?? '' }}
                            </td>
                            <td>
                                {{ $institucione->nombre_institucion ?? '' }}
                            </td>
                            <td>
                                {{ $institucione->comuna->codigo ?? '' }}
                            </td>
                            <td>
                                @can('institucione_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.instituciones.show', $institucione->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('institucione_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.instituciones.edit', $institucione->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('institucione_delete')
                                    <form action="{{ route('admin.instituciones.destroy', $institucione->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('institucione_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.instituciones.massDestroy') }}",
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
  let table = $('.datatable-comunaInstituciones:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection