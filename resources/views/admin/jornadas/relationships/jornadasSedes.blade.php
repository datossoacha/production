@can('sede_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sedes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sede.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sede.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-jornadasSedes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sede.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sede.fields.institucion') }}
                        </th>
                        <th>
                            {{ trans('cruds.sede.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.sede.fields.jornadas') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sedes as $key => $sede)
                        <tr data-entry-id="{{ $sede->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sede->id ?? '' }}
                            </td>
                            <td>
                                {{ $sede->institucion->nombre_institucion ?? '' }}
                            </td>
                            <td>
                                {{ $sede->nombre ?? '' }}
                            </td>
                            <td>
                                @foreach($sede->jornadas as $key => $item)
                                    <span class="badge badge-info">{{ $item->nombre }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('sede_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sedes.show', $sede->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sede_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sedes.edit', $sede->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sede_delete')
                                    <form action="{{ route('admin.sedes.destroy', $sede->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sede_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sedes.massDestroy') }}",
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
    pageLength: 50,
  });
  let table = $('.datatable-jornadasSedes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection