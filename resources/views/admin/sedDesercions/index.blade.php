@extends('layouts.admin')
@section('content')
@can('sed_desercion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sed-desercions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sedDesercion.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sedDesercion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SedDesercion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.matricula_aplicable') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.retiros') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.desercion') }}
                        </th>
                        <th>
                            {{ trans('cruds.sedDesercion.fields.fecha_corte') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sedDesercions as $key => $sedDesercion)
                        <tr data-entry-id="{{ $sedDesercion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sedDesercion->id ?? '' }}
                            </td>
                            <td>
                                {{ $sedDesercion->matricula_aplicable ?? '' }}
                            </td>
                            <td>
                                {{ $sedDesercion->retiros ?? '' }}
                            </td>
                            <td>
                                {{ $sedDesercion->desercion ?? '' }}
                            </td>
                            <td>
                                {{ $sedDesercion->fecha_corte ?? '' }}
                            </td>
                            <td>
                                @can('sed_desercion_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sed-desercions.show', $sedDesercion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sed_desercion_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sed-desercions.edit', $sedDesercion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sed_desercion_delete')
                                    <form action="{{ route('admin.sed-desercions.destroy', $sedDesercion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sed_desercion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sed-desercions.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-SedDesercion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection